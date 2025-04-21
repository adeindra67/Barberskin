@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Distributor</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('distributors.index') }}">Daftar Distributor</a></li>
            <li class="breadcrumb-item active">Edit Distributor</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Distributor
            </div>
            <div class="card-body">
                <form action="{{ route('distributors.update', $distributor) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Distributor:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $distributor->nama) }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis Distributor:</label>
                        <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis" value="{{ old('jenis', $distributor->jenis) }}">
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat', $distributor->alamat) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="logosupplier">Logo Distributor:</label>
                        <input type="file" class="form-control" id="logosupplier" name="logosupplier">

                        @if ($distributor->logosupplier)
                            <img src="{{ asset('image/' . $distributor->logosupplier) }}" alt="{{ $distributor->nama }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection