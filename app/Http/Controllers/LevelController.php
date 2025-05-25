<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level',
            'list' => ['Home', 'Level']
        ];
        $page = (object) [
            'title' => 'Daftar level yang terdaftar dalam sistem'
        ];
        $activeMenu = 'level';
        return view('level.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];
        $page = (object) ['title' => 'Tambah level baru'];
        $activeMenu = 'level';
        return view('level.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function createAjax()
    {
        try {
            return view('level.create_ajax');
        } catch (\Exception $e) {
            Log::error('Error in createAjax: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Gagal memuat form tambah level'
            ], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100'
        ]);
        
        LevelModel::create($request->only(['level_kode', 'level_nama']));
        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    public function storeAjax(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'level_kode' => 'required|string|min:3|unique:m_level,level_kode',
                'level_nama' => 'required|string|max:100'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            LevelModel::create($request->only(['level_kode', 'level_nama']));
            
            return response()->json([
                'status' => true,
                'message' => 'Data level berhasil disimpan',
                'redirect' => route('level.index')
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error in storeAjax: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function list(Request $request)
    {
        $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');
        
        if ($request->level_id) {
            $levels->where('level_id', $request->level_id);
        }

        return DataTables::of($levels)
            ->addIndexColumn()
            ->addColumn('aksi', function ($level) {
                $btn = '<button onclick="modalAction(\''.route('level.show_ajax', $level->level_id).'\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\''.route('level.edit_ajax', $level->level_id).'\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\''.route('level.confirm_delete_ajax', $level->level_id).'\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function show($id)
    {
        $level = LevelModel::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];
        $page = (object) ['title' => 'Detail level'];
        $activeMenu = 'level';
        return view('level.show', compact('breadcrumb', 'page', 'level', 'activeMenu'));
    }

    public function showAjax($id)
    {
        try {
            $level = LevelModel::findOrFail($id);
            return view('level.show_ajax', compact('level'));
        } catch (\Exception $e) {
            Log::error('Error in showAjax: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function edit($id)
    {
        $level = LevelModel::findOrFail($id);
        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];
        $page = (object) ['title' => 'Edit level'];
        $activeMenu = 'level';
        return view('level.edit', compact('breadcrumb', 'page', 'level', 'activeMenu'));
    }

    public function editAjax($id)
    {
        try {
            $level = LevelModel::findOrFail($id);
            return view('level.edit_ajax', compact('level'));
        } catch (\Exception $e) {
            Log::error('Error in editAjax: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode,'.$id.',level_id',
            'level_nama' => 'required|string|max:100',
        ]);

        LevelModel::find($id)->update($request->only(['level_kode', 'level_nama']));
        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function updateAjax(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'level_kode' => 'required|string|min:3|unique:m_level,level_kode,'.$id.',level_id',
                'level_nama' => 'required|string|max:100'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 422);
            }

            $level = LevelModel::findOrFail($id);
            $level->update($request->only(['level_kode', 'level_nama']));
            
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil diupdate',
                'redirect' => route('level.index')
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error in updateAjax: ' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan server'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $level = LevelModel::findOrFail($id);
            $level->delete();
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/level')->with('error', 'Data level gagal dihapus: '.$e->getMessage());
        }
    }

   public function confirmDeleteAjax($id)
{
    try {
        $level = LevelModel::findOrFail($id);
        return view('level.confirm_delete_ajax', compact('level'));
    } catch (\Exception $e) {
        Log::error('Error in confirmDeleteAjax: ' . $e->getMessage());
        return response()->json([
            'status' => false,
            'message' => 'Data tidak ditemukan'
        ], 404);
    }
}

public function deleteAjax($id)
{
    try {
        $level = LevelModel::findOrFail($id);
        $level->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus',
            'redirect' => route('level.index')
        ]);
    } catch (\Exception $e) {
        Log::error('Error in deleteAjax: ' . $e->getMessage());
        return response()->json([
            'status' => false,
            'message' => 'Gagal menghapus data: ' . $e->getMessage()
        ], 500);
    }
}
}