
@extends('adminlte::page') 
@section('title', 'Form pengarang') 
@section('content_header')
    <h1>Form pengarang</h1>
    <br/><br/>
    <a href="{{ route('pengarang.index') }}"class="btn btn-info btn-md"role="button"><i class="fa fa-arrow-left">Back</i></a>
@stop
@section('content') 

@if($errors->any())
    <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li> 
    @endforeach
    </ul>
    </div>
    @endif

    @php
        $rs1 = App\Models\Buku::all();
        $rs2 = App\Models\Penerbit::all();
        $rs3 = App\Models\Kategori::all();
    @endphp
    <form action= "{{ route('pengarang.store') }}"method ="POST">
        @csrf 
        
        <div class="form-group">
        <label>ISBN</label>
            <input type="text" name="isbn" class="form-control">
        </div>
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control">
        </div>
        <div class="form-group">
            <label>Tahun Cetak</label>
            <input type="text" name="tahun_cetak" class="form-control">
        </div>
        <div class="form-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control">
        </div>
        <div class="form-group">
            <label>Buku</label>
            <select class="form-control" name="idbuku">
                <option value="">-- Pilih Buku --</option>
                @foreach ($rs1 as $bku)
                <option value="{{ $bku->id }}">{{ $bku->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label>Penerbit</label>
                <select class="form-control" name="idpenerbit">
                    <option value=
                    "">-- Pilih Penerbit --</option>
                    @foreach($rs2 as $pen)
                    <option value=
                    "{{ $pen->id }}">{{ $pen->nama }}</option> 
                    @endforeach
                </select>
        </div>

        <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="idpenerbit">
                    <option value=
                    "">-- Pilih kategori --</option>
                    @foreach($rs3 as $kat)
                    <option value=
                    "{{ $kat->id }}">{{ $kat->nama }}</option> 
                    @endforeach
                </select>
        </div>
        <button type="submit" class="btn btn-primary"name="proses">Simpan</button>
    </form>
@stop