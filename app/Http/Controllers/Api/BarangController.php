<?php

namespace App\Http\Controllers\Api;

use App\Models\BarangModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BarangRequest;
class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(BarangRequest $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:m_kategori',
            'barang_kode' => 'required|unique:m_barang,barang_kode|string|min:3|max:10',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Check if file image is present in the request
        if ($request->hasFile('image_barang')) {
            $barang = barangModel::create([
                'kategori_id' => $request->kategori_id,
                'barang_kode' => $request->barang_kode,
                'barang_nama' => $request->barang_nama,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'image' => $request->image_barang->hashName(),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'errors' => 'No image file uploaded',
            ], 422);
        }

        if ($barang) {
            return response()->json([
                'success' => true,
                'barang' => $barang
            ], 201);
        }

        return response()->json([
            'success' => false
        ], 409);
    }

    /**
     * Display the specified resource.
     */
    public function show(barangModel $barang): JsonResponse
    {
        return response()->json([
            'success' => true,
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangRequest $request, barangModel $barang): JsonResponse
    {
        $isUpdated = $barang->update($request->safe()->all());

        if (!$isUpdated) {
            return response()->json([
                'success' => false,
                'errors' => 'conflict with request data and current database',
            ], 409);
        }

        return response()->json([
            'success' => true,
            'barang' => $barang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barangModel $barang): JsonResponse
    {
        try {
            $barang->delete();
            return response()->json([
                'success' => true,
                'message' => 'Barang Data success deleted'
            ]);
        } catch (QueryException $qe) {
            return response()->json([
                'success' => false,
                'errors' => $qe->getMessage(),
            ], 422);
        }
    }
}