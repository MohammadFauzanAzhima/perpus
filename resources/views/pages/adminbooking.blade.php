@extends('layouts.main')

@section('perpus')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalCreate">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
                    </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Judul Buku</th>
                            <th>User</th>
                            <th>Tgl Peminjaman</th>
                            <th>Tgl Pengembalian</th>
                            {{-- <th>Stok</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $booking->kode }}</td>
                            <td>{{ $booking->judul }}</td>
                            <td>{{ $booking->nameuser }}</td>
                            <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                            <td>{{ date('d-m-Y', strtotime($booking->expired_at) )}}</td>
                            {{-- <td>{{ $booking->book->stok }}</td> --}}
                            <td class="d-flex flex-row align-items-start gap-1">
                                -
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection