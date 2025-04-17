<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('pages.home', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'author' => 'required|max:255|string',
            'published_date' => 'required|date',
        ]);

        Book::create($request->all());

        return redirect()->route('bookss.index')->with('success', 'successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('pages.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('pages.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'author' => 'required|max:255|string',
            'published_date' => 'required|date',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('bookss.index')->with('success', 'successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('bookss.index')->with('success', 'successfully deleted');
    }
}
