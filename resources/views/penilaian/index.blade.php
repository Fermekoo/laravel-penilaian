@extends('layouts.backend')
@section('assets-top')

<link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Data Penialaian</div>
        @if (session('sukses'))
        <div class="alert alert-info">
          {{ session('sukses') }}
        </div>
        @elseif (session('edit'))
        <div class="alert alert-warning">
                {{ session('edit') }}
              </div>
        @elseif (session('hapus'))
        <div class="alert alert-danger">
                {{ session('hapus') }}
              </div>
       @endif

    </div>
    <div class="card-body">
        <div class="card-sub">
           <a href="{{ route('penilaian.create')}}" class="btn btn-danger btn-sm">Tambah data</a>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Nis</th>
                <th>Pelanggaran</th>
                <th>Bobot Pelanggaran</th>
                <th>Keterangan</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Nis</th>
                    <th>Pelanggaran</th>
                    <th>Bobot Pelanggaran</th>
                    <th>Keterangan</th>
                    <th></th>
            </tfoot>
            <tbody>

            </tbody>
          </table>
@endsection
@section('assets-bottom')
    <!-- Page level plugin JavaScript-->
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('datatables/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#dataTable").DataTable({
                processing :true,
                serverSide :true,
                ajax       :"{{ route('api.datatable.penilaian') }}",
                columns:[
                    {data: 'DT_Row_Index',orderable: false, searchable: false},
                    {data: 'nama',               name: 'nama' },
                    {data: 'nis',                name: 'nis' },
                    {data: 'pelanggaran',        name: 'pelanggaran' },
                    {data: 'bobot',              name: 'bobot' },
                    {data: 'keterangan',         name: 'keterangan' },
                    {data: 'action',             name: 'action', orderable:false, seacrhable:false},
              ]
            })
        });
    </script>
@endsection