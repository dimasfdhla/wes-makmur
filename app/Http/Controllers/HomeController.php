<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Post::with('Kategori')->get();


        if (Auth::user()->role == 'admin') {
            return view('index', compact('data'));
        }else{
            return view('index', compact('data'));
        }
    }

    public function detail_artikel($id)
    {
        $data = Post::find($id);
        $produk = Produk::where('kategori_id', $data->kategori_id)->get();

        return view('detail_artikel', compact('data', 'produk'));
        
    }

    public function detail_produk($id)
    {
        $data = Produk::find($id);

        return view('detail_produk', compact('data'));
        
    }
}
