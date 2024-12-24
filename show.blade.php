@extends('adminlte::page')
@section('title', 'Form Pengarang')
@section('content_header')
@stop
 

@section('content')

<h1 > Form Pengarang</h1>
@php
   $rs1 = App\Models\Buku::all();
   $rs2 = App\Models\Penerbit::all();
   $rs3 = App\Models\Kategori::all();
@endphp  

@foreach($ar_pengarang as $b)

<form action="#" >
    @csrf
    <div class="form-group">
    <label for="">ISBN</label>
    <input type="text"placeholder="{{ $b->isbn}}" class="form-control" disabled/>
    </div>

    <div class="form-group">
    <label for="">Judul</label>
    <input type="text" placeholder="{{ $b->judul}}" class="form-control" disabled/>
    </div>

    <div class="form-group">
    <label for="">Tahun_cetak</label>
    <input type="text" placeholder="{{ $b->tahun_cetak}}" class="form-control" disabled/>
    </div>

    <div class="form-group">
    <label for="">Stok</label>
    <input type="text" placeholder="{{ $b->stok}}" class="form-control" disabled/>
    </div>

    <div>
        <div class="form-label">
            <label>Buku</label>
            <select name="idbuku" class="form-control" disabled>
                <option value="">--Pilih Buku--</option>
                @foreach($rs1 as $p)
                @php
                      $sel1 = ($p->id == $b->idbuku) ? 'selected' : ''; 
                @endphp
                   <option value="{{ $p->id }}" {{ $sel1}}>{{ $p->nama }}</option>
                @endforeach    
            </select>
        </div>
    </div>
    <div>
        <div class="form-label">
            <label>Penerbit</label>
            <select name="idpenerbit" class="form-control" disabled>
                <option value="">--Pilih Penerbit--</option>
                @foreach($rs2 as $pen)
                @php
                      $sel2 = ($pen->id == $b->idpenerbit) ? 'selected' : ''; 
                @endphp
                   <option value="{{ $p->id }}" {{ $sel2}}>{{ $pen->nama }}</option>
                @endforeach    
            </select>
        </div>
    </div>
    <div>
        <div class="form-label">
            <label>Kategori</label>
            <select name="idkategori" class="form-control" disabled>
                <option value="">--Pilih Kategori--</option>
                @foreach($rs3 as $kat)
                @php
                      $sel3 = ($kat->id == $b->idkategori) ? 'selected' : ''; 
                @endphp
                   <option value="{{ $kat->id }}" {{ $sel3}}>{{ $kat->nama }}</option>
                @endforeach    
            </select>
        </div>
    </div>

    <a class="btn btn-primary btn-md"
    href="{{ route('pengarang.index') }}" role="button"><i class="fa fa-arrow-left"> Back</i></a>
    <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
     -->
</form>
@endforeach
@stop

@section('css')
<link rel="stylesheet" href="css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi'); </script>
@stop
