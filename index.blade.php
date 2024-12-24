@extends('adminlte::page')
@section('title', 'Data Pengarang')
@section('content_header')
<h1 class="fa fa-book"> Data Pengarang</h1>
@stop

@section('content')
@if (session('success'))
<div class="alert alert-info">
    {{session('success')}}
</div>
@endif
@php
$ar_judul = ['No','ISBN','Judul','Stok','Buku','Penerbit','Kategori','Action'];
$no = 1;
@endphp
<a class="btn btn-primary btn-md" href="{{ route('pengarang.create')}}" role="button"><i class="fa fa-plus"> Tambah pengarang</i></a>

<br/><br/>
<br/><br/>
<div class="card">
 <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
          <tr>
              @foreach($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
              @endforeach
          </tr>
      </thead>
      <tbody>
          @foreach($ar_pengarang as $pen)
              <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $pen->isbn }}</td>
                  <td>{{ $pen->judul }}</td>
                  <td>{{ $pen->stok }}</td>
                  <td>{{ $pen->nama }}</td>
                  <td>{{ $pen->pen }}</td>
                  <td>{{ $pen->kat }}</td>
                  <td>
                      <form action="{{ route('pengarang.destroy',$pen->id) }}" method="POST">
                          @csrf 
                          @method('delete')
                          <a href="{{ route('pengarang.show',$pen->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                          <a href="{{ route('pengarang.edit',$pen->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                          <button class="btn btn-danger" onclick="return confim('Anda Yakin Ingin Dihapus?')"><i class="fa fa-trash"></i></button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="css/admin_custom.css">
 <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script> console.log('Hi'); </script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@stop