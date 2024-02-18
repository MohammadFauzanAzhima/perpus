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
                            <th>Judul</th>
                            <th>Kode</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->kode }}</td>
                            <td>{{ $book->penulis }}</td>
                            <td>{{ $book->penerbit }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->stok }}</td>
                            <td class="d-flex flex-row align-items-start gap-1">
                                <a class="btn btn-info" href="/admin/books/{{ $book->id }}"><i class="bi bi-eye"></i></a>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $book->id }}">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action={{ route('databooks.destroy', $book) }} method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button></form>
                            </td>
                        </tr>

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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

<!-- Modal create -->
<div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form action="/databooks" method="POST" enctype="multipart/form-data"> 
    @csrf
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul <small>(minimal 3 karakter)</small></label>
                    <input type="text" class="form-control" id="judul" name="judul" required>
                </div>
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode <small>(minimal 5 karakter)</small></label>
                    <input type="text" class="form-control" id="kode" name="kode" required>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Cover Buku</label>
                    <input class="form-control" type="file" id="cover" name="cover">
                  </div>
                  
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" id="category" name="category_id" required>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                      </select>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" required>
                </div>
                <div class="mb-3">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi <small>(minimal 10 karakter)</small></label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
    </form>
    </div>
</div>