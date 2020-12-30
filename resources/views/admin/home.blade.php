@extends('layouts.admin_app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Rekap Data </div>
                <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="table-responsive">
                        <table class="datatable table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                    </tbody>
                        </table>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
            $(function() {
                $('.datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('dtktps.index') }}',
                    columns: [
                        {data: 'id'},
                        {data: 'nik'},
                        {data: 'nama'},
                        {data: 'jenisKelamin'},
                        {data: 'alamat'},
                        {data: 'action', name: 'action', orderable: true, searchable: true},
                    ]
                });
            });
        </script>
@endsection