@extends('admin.layouts.main')

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
                <div class="card-body d-flex gap-1">
                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $book->id }}">
                    <i class="bi bi-pencil-square"> Edit</i>
                </button>
                <form action="/admin/books/{{ $book->id}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button></form>
                </div>
            </div>
        </div>
  
    </div>
    
  </div>
@endsection

{{-- modal edit --}}
<div class="modal fade" id="ModalEdit{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form action="/admin/books/{{ $book->id }}" method="POST" enctype="multipart/form-data"> 
  @csrf
  @method('put')
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <div class="mb-3">
                  <label for="judul" class="form-label">Judul <small>(minimal 3 karakter)</small></label>
                  <input type="text" class="form-control" id="judul" name="judul" value="{{ $book->judul }}">
              </div>
              <div class="mb-3">
                  <label for="kode" class="form-label">Kode <small>(minimal 5 karakter)</small></label>
                  <input type="text" class="form-control" id="kode" name="kode" value="{{ $book->kode }}">
              </div>
              <div class="mb-3">
                  <label for="cover" class="form-label">Cover Buku</label>
                  <input class="form-control" type="file" id="cover" name="cover">
                </div>
                
              <div class="mb-3">
                  <label for="category" class="form-label">Kategori</label>
                  <select class="form-select" id="category" name="category_id" value="{{ $book }}">
                      @foreach ($categories as $category)
                      @if ($category->name === $book->category->name)
                      <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                      @else
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                    @endforeach
                    </select>
              </div>
              <div class="mb-3">
                  <label for="penulis" class="form-label">Penulis</label>
                  <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $book->penulis }}">
              </div>
              <div class="mb-3">
                  <label for="penerbit" class="form-label">Penerbit</label>
                  <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $book->penerbit }}">
              </div>
              <div class="mb-3">
                  <label for="stok" class="form-label">Stok</label>
                  <input type="number" class="form-control" id="stok" name="stok" value="{{ $book->stok }}">
              </div>
              <div class="mb-3">
                  <labelfor="deskripsi">Deskripsi <small>(minimal 10 karakter)</small></labelfor=>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" >{{ $book->deskripsi }}</textarea>
              </div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Edit</button>
      </div>
  </div>
  </form>
  </div>
</div>