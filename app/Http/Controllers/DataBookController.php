<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DataBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.databooks', [
            'books' => Book::all(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        $validatedData = $request->validate([
            'judul' => 'required|min:3',
            'kode' => 'required|min:5',
            'penulis' => 'required',
            'penerbit' => 'required',
            'category_id' => 'required',
            'deskripsi' => 'required|min:10',
            'stok' => 'required',
            'cover' => 'image|file|max:1024',
        ]);

        if($validatedData['cover']){
            $validatedData['cover'] = $request->file('cover')->store('books-cover');
        };

        Book::create($validatedData);

        return redirect()->back()->with('success', 'buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}