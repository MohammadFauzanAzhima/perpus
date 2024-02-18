@extends('layouts.main')

@section('perpus')
<div class="card shadow mb-4">
<!--
<div class="card-header">
    <button type="button" class="btn btn-primary">Tambah</button>
</div>
-->
<div class="card-body">
<table class="table" id="dataTables">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Nama User</th>
        <th scope="col">Judul buku</th>
        <th scope="col">Tanggal Pengembalian</th>
        <th scope="col">Status</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $booking)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $booking->kode }}</td>
        <td>{{ $booking->nameuser }}</td>
        <td>{{ $booking->judul }}</td>
        <td>{{ $booking->expired_at }}</td>
        <td>{{ $booking->status }}</td>
        <td>
            <a href="/booking/{{ $booking->id }}" class="btn btn-info badge"><i class="bi bi-eye"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection