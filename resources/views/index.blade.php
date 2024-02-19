@extends('layouts.main')

@section('perpus')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 mt-4">
    @foreach ($books as $book)
    <div class="card shadow" style="width: 18rem; margin-top:50px; margin-left:22px; margin-right:40px;">
    @if ($book->cover)
    <img src="/storage/{{ $book->cover }}" style="height:220px; margin-top:10px" class="card-img-top" alt="...">
    @else
    <img src="{{ asset('img/bookCoverDefault.png') }}" style="height:220px; margin-top:10px" class="card-img-top" alt="...">
    @endif
    <div class="card-body">
      <h5 class="card-title">{{ $book->judul }}</h5>
      <a href="/books/{{ $book->id }}" class="btn btn-primary">Lihat Buku</a>
    </div>
  </div>
  @endforeach
</div>
@endsection