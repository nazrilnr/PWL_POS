<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Symfony\Component\HttpFoundation\Response;

class KategoriController extends Controller
{
    public function index()
    {
        return KategoriModel::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_kode' => 'required|unique:m_kategori',
            'kategori_nama' => 'required'
        ]);

        $kategori = KategoriModel::create($validated);
        return response()->json($kategori, Response::HTTP_CREATED);
    }

    public function show(KategoriModel $kategori)
    {
        return $kategori;
    }

    public function update(Request $request, KategoriModel $kategori)
    {
        $validated = $request->validate([
            'kategori_kode' => 'sometimes|unique:m_kategori,kategori_kode,'.$kategori->kategori_id.',kategori_id',
            'kategori_nama' => 'sometimes'
        ]);

        $kategori->update($validated);
        
        return response()->json([
            'success' => true,
            'message' => 'Data updated successfully',
            'data' => $kategori
        ]);
    }

    public function destroy(KategoriModel $kategori)
    {
        $kategori->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully'
        ]);
    }
}