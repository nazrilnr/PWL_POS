<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $req)
    {
        $level = BarangModel::create($req->all());
        return response()->json($level, Response::HTTP_CREATED);
    }

    public function show(BarangModel $barang)
    {
        return BarangModel::find($barang);
    }

    public function update(Request $request, $barang_id)
    {
        $barang = BarangModel::where('barang_id', $barang_id)->first();

        if (!$barang) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found'
            ], 404);
        }

        $barang->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated successfully',
            'data' => $barang
        ]);
    }

    public function destroy($id)
    {
        try {
            $barang = BarangModel::find($id);

            if (!$barang) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data barang tidak ditemukan'
                ], 404);
            }

            $barang->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data barang berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data barang',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function uploadImage(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'kategori_id' => 'required|integer',
            'barang_kode' => 'required|string|max:50',
            'barang_nama' => 'required|string|max:255',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $data = $req->all();

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/barang'), $imageName);
            $data['image'] = 'uploads/barang/' . $imageName;
        }

        $barang = BarangModel::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Barang dengan gambar berhasil ditambahkan',
            'data' => $barang
        ], Response::HTTP_CREATED);
    }
}
