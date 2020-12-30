@extends('layouts.admin_app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Kartu Penduduk 
                
                
                <a class="btn btn-primary" href="{{ route('dtktps.index') }}">{{ __('Edit Data') }}</a>
                
                </div>
                <div class="card-body">
                
                
                    <div class="form-group row">
                        
                        <label for="propinsi" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>
                        <div class="col-md-6">
                            <label for="propinsi" class="col-md-8 col-form-label text-md-left">{{ $data->nik}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <label for="propinsi" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                        <div class="col-md-6">
                            <label for="propinsi" class="col-md-8 col-form-label text-md-left">{{ $data->nama}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <label for="propinsi" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                        <div class="col-md-6">
                            <label for="propinsi" class="col-md-8 col-form-label text-md-left">{{ $data->jenisKelamin}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <label for="propinsi" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-6">
                            <label for="propinsi" class="col-md-8 col-form-label text-md-left">{{ $data->status}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        
                        <label for="propinsi" class="col-md-4 col-form-label text-md-right">{{ __('alamat') }}</label>
                        <div class="col-md-6">
                            <label for="propinsi" class="col-md-8 col-form-label text-md-left">{{ $data->alamat}}</label>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection