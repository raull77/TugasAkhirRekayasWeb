<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function create(Request $request)
    {
        $pelanggan = Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        return response()->json($pelanggan);
    }

    public function read()
    {
        return response()->json(Pelanggan::all());
    }

    public function show($id)
    {
        return response()->json(Pelanggan::find($id));
    }

    public function update(Request $request, $id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon
        ]);

        return response()->json([
            'message' => 'Pelanggan berhasil diperbarui',
            'data' => $pelanggan
        ]);
    }

    public function delete($id)
    {
        Pelanggan::destroy($id);

        return response()->json(['message' => 'Pelanggan berhasil dihapus']);
    }
}
