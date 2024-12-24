<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengarang;
use DB;
class PengarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $ar_pengarang = DB::table('pengarang')
        ->join('buku', 'buku.idpengarang', '=', 'pengarang.id') // Pastikan kolom yang direferensikan benar
        ->join('penerbit', 'penerbit.id', '=', 'buku.idpenerbit') // Asumsi buku memiliki idpenerbit
        ->join('kategori', 'kategori.id', '=', 'buku.idkategori') // Asumsi buku memiliki idkategori
        ->select('pengarang.*', 'buku.judul AS judul_buku', 'penerbit.nama AS nama_penerbit', 'kategori.nama AS nama_kategori')
        ->get();

    return view('pengarang.index', compact('ar_pengarang'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pengarang.c_pengarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
