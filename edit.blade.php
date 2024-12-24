@extends('adminlte::page')
@section('title', 'Form Pengarang')
@section('content_header')
@stop
 

@section('content')

<h1 > Form Pengarang</h1>
@php
   $rs1 = App\Models\pengarang::all();
   $rs2 = App\Models\Penerbit::all();
   $rs3 = App\Models\Kategori::all();
@endphp  

@foreach($data as $d)

<form action="{{ route('pengarang.update',$d->id) }}" method="POST"  >
    @csrf
    @method('put')
    <div class="form-group">
    <label>ISBN</label>
    <input type="text" name="isbn" value="{{ $d->isbn}}" class="form-control" />
    </div>

    <div class="form-group">
    <label>Judul</label>
    <input type="text" name="judul" value="{{ $d->judul}}" class="form-control" />
    </div>

    <div class="form-group">
    <label>Tahun_cetak</label>
    <input type="text" name="tahun_cetak" value="{{ $d->tahun_cetak}}" class="form-control" />
    </div>

    <div class="form-group">
    <label>Stok</label>
    <input type="text" name="stok" value="{{ $d->stok}}" class="form-control" />
    </div>

    <div>
        <div class="form-label">
            <label>Buku</label>
            <select name="idbuku" class="form-control" >
                <option value="">--Pilih Buku--</option>
                @foreach($rs1 as $bku)
                @php
                      $sel1 = ($bku->id == $d->idbuku) ? 'selected' : ''; 
                @endphp
                   <option value="{{ $bku->id }}" {{ $sel1}}>{{ $bku->nama }}</option>
                @endforeach    
            </select>
        </div>
    </div>
    <div>
        <div class="form-label">
            <label>Penerbit</label>
            <select name="idpenerbit" class="form-control" >
                <option value="">--Pilih Penerbit--</option>
                @foreach($rs2 as $pen)
                @php
                      $sel2 = ($pen->id == $d->idpenerbit) ? 'selected' : ''; 
                @endphp
                   <option value="{{ $p->id }}" {{ $sel2}}>{{ $pen->nama }}</option>
                @endforeach    
            </select>
        </div>
    </div>
    <div>
        <div class="form-label">
            <label>Kategori</label>
            <select name="idkategori" class="form-control" >
                <option value="">--Pilih Kato--</option>
                @foreach($rs3 as $kat)
                @php
                      $sel3 = ($kat->id == $d->idkategori) ? 'selected' : ''; 
                @endphp
                   <option value="{{ $kat->id }}" {{ $sel3}}>{{ $kat->nama }}</option>
                @endforeach    
            </select>
        </div>
    </div>

   <br></br>
    <button type="submit" class="btn btn-primary"><i class="fa fa-check">Update</i></button>
    
</form>
@endforeach
@stop

