@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Produk</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Produk</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Produk
                </a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->nama }}</td>
                                <td>{{ $product->category->nama_kategori }}</td> 
                                <td>{{ $product->jenis }}</td>
                                <td>{{ $product->stok }}</td>
                                <td>
                                    @empty($product->foto)
                                        <img src="{{ asset('image/nophoto.jpg') }}" 
                                            alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                    @else
                                        <img src="{{ asset('image/' . $product->foto) }}" 
                                            alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                    @endempty
                                </td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-secondary">Lihat</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection