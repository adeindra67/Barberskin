@extends('layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Distributor</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Daftar Distributor</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('distributors.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Distributor
                </a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Alamat</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Alamat</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($distributors as $distributor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $distributor->nama }}</td>
                                <td>{{ $distributor->jenis }}</td>
                                <td>{{ $distributor->alamat }}</td>
                                <td>
                                    @empty($distributor->logosupplier)
                                        <img src="{{ asset('image/nophoto.jpg') }}" 
                                            alt="distributor-logo" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                    @else
                                        <img src="{{ asset('image/' . $distributor->logosupplier) }}" 
                                            alt="distributor-logo" class="rounded" style="width: 100%; max-width: 100px; height: auto;">
                                    @endempty
                                </td>
                                <td>
                                    <a href="{{ route('distributors.show', $distributor) }}" class="btn btn-sm btn-secondary">Lihat</a>
                                    <a href="{{ route('distributors.edit', $distributor) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('distributors.destroy', $distributor) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus distributor ini?')">Hapus</button>
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