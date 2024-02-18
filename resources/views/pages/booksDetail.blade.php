@extends('layouts.main')

@section('perpus')
<div class="container mt-4" style="margin-bottom: 6rem">
  
    {{-- card --}}
    <div class="row">
  
      <!-- Cover Image -->
      <div class="col-md-3">
        <div class="card shadow mb-4">
            <div class="card-body">
              @if ($book->cover)
              <img src="/storage/{{ $book->cover }}" style="height:220px; margin-top:10px" class="card-img-top" alt="...">
              @else
              <img src="{{ asset('img/bookCoverDefault.png') }}" style="height:220px; margin-top:10px" class="card-img-top" alt="...">
              @endif
            </div>
        </div>
      </div>
  
        <!-- Information -->
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 fw-bold">Detail Buku</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <table>
                    <tr class="d-flex gap-4">
                      <td class="fw-medium">Judul : </td>
                      <td>{{ $book->judul }}</td>
                    </tr>
                    <tr class="d-flex gap-4">
                      <td class="fw-medium">Penulis : </td>
                      <td>{{ $book->penulis }}</td>
                    </tr>
                    <tr class="d-flex gap-4">
                      <td class="fw-medium">Penerbit : </td>
                      <td>{{ $book->penerbit }}</td>
                    </tr>
                    <tr class="d-flex gap-4">
                      <td class="fw-medium">Kategori : </td>
                      <td>{{ $book->category->name }}</td>
                    </tr>
                    <tr class="d-flex gap-4">
                      <td class="fw-medium">Deskripsi : </td>
                      <td>{{ $book->deskripsi }}</td>
                    </tr>
                    <tr class="d-flex gap-4">
                      <td class="fw-medium">Stok : </td>
                      <td>{{ $book->stok }}</td>
                    </tr>
                  </table>
                </div>
  
                {{-- proses --}}
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 fw-bold">Peminjaman</h6>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Pinjam Buku
                      </button>
                </div>
            </div>
        </div>
  
    </div>
    
  </div>
@endsection

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="/booking" method="POST">
          @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pinjam Buku {{ $book->judul }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="alasan" class="form-label">Alasan Pinjam</label>
            <textarea class="form-control" id="alasan" rows="3" name="alasan"></textarea>
          </div>
          <div class="mb-3">
            <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
            <input type="date" class="form-control" id="tgl_kembali" name="expired_at"></input>
          </div>
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <label for="exampleInputPassword1">Nama User</label>
                <input type="text" class="form-control" name="nameuser">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Book_Id</label>
                <input type="text" class="form-control" name="book_id" value="{{ $book->id }}">
              </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Judul</label>
                <input type="text" class="form-control" name="judul" value="{{ $book->judul }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Status</label>
                <input type="text" class="form-control" name="status" value="{{ 'diajukan' }}">
              </div>
               <input type="text" name="is_denda" value="{{ 0 }}" hidden>
              

            {{-- <input type="text" name="user" value="nama user" hidden>
            <input type="text" name="book_id" value="{{ $book->id }}" hidden>
            <input type="text" name="status" value="{{ 'diajukan' }}" hidden>
            <input type="text" name="is_denda" value="{{ 0 }}" hidden>--}}
            <button type="submit" class="btn btn-primary">Setuju Pinjam</button> 
        </form>
        </div>
      </div>
    </div>
  </div>