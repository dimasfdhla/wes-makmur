<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::all();
        return view('produk.tampil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();

        // dd('Ini fungsi create');
        return view('produk.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|int',
            'desc_produk' => 'required|string',
            'kategori_id' => 'required|',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Mengunggah file gambar
        $fotoName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img'), $fotoName);

        $validator['foto'] = $fotoName;


        Produk::create($validator);
        return redirect('produk')->with('success', 'Data Berhasil Diinput!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Produk::find($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|int',
            'desc_produk' => 'required|string',
            'kategori_id' => 'required|',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->hasFile('foto')){

           $fotoName = time() . '.' . $request->foto->extension();
           $request->foto->move(public_path('img'), $fotoName);

           $validator['foto'] = $fotoName;

       }
       
        Produk::find($id)->update($validator);
        return redirect('produk')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd('ini fungsi delete');
        Produk::find($id)->delete();
        return redirect('produk')->with('success', 'Data berhasil dihapus!');

    }
}
