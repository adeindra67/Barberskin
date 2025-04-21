@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Detail Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Daftar Produk</a></li>
            <li class="breadcrumb-item active">Detail Produk</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info-circle me-1"></i>
                Detail Produk
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        @empty($product->foto)
                            <img src="{{ asset('image/nophoto.jpg') }}" 
                                alt="product-image" class="img-fluid rounded">
                        @else
                            <img src="{{ asset('image/' . $product->foto) }}" 
                                alt="product-image" class="img-fluid rounded">
                        @endempty
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama Produk</th>
                                    <td>{{ $product->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $product->category->nama_kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis</th>
                                    <td>{{ $product->jenis }}</td>
                                </tr>
                                <tr>
                                    <th>Stok</th>
                                    <td>{{ $product->stok }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $product->deskripsi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-4">Kembali</a>
            </div>
        </div>
    </div>
@endsection