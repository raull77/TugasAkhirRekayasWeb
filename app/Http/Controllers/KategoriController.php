<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function create(Request $request)
    {
        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return response()->json($kategori);
    }

    public function read()
    {
        return response()->json(Kategori::all());
    }

    public function show($id)
    {
        return response()->json(Kategori::find($id));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);

        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        return response()->json([
            'message' => 'Kategori berhasil diperbarui',
            'data' => $kategori
        ]);
    }

    public function delete($id)
    {
        Kategori::destroy($id);

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
