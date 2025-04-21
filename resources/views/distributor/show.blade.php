@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Distributor</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('distributors.index') }}">Daftar Distributor</a></li>
            <li class="breadcrumb-item active">Detail Distributor</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info-circle me-1"></i>
                Detail Distributor
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @empty($distributor->logosupplier)
                            <img src="{{ asset('image/nophoto.jpg') }}" 
                                alt="distributor-logo" class="img-fluid rounded">
                        @else
                            <img src="{{ asset('image/' . $distributor->logosupplier) }}" 
                                alt="distributor-logo" class="img-fluid rounded">
                        @endempty
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama Distributor</th>
                                    <td>{{ $distributor->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Distributor</th>
                                    <td>{{ $distributor->jenis }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $distributor->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('distributors.index') }}" class="btn btn-secondary mt-4">Kembali</a>
            </div>
        </div>
    </div>
@endsection