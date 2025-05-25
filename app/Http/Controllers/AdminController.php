<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class AdminController extends Controller
{
    public function view_category() 
    {
        $data = category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request) 
    {
        $data = new category;
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message','Berhasil menambahkan kategori.');
    }

    public function delete_category($id) 
    {
        $data = category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Berhasil menghapus kategori.');
    }

    public function view_book()
    {
        $category = category::all();
        return view ('admin.book',compact('category'));
    }

    public function add_book(Request $request)
    {
        $book = new book;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->writer = $request->writer;
        $book->publisher = $request->publisher;
        $book->format = $request->format;
        $book->category = $request->category;
        $book->isbn = $request->isbn;
        $book->quantity = $request->quantity;
        
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('book',$imagename);
        $book->image = $imagename;

        $book->save();
        return redirect()->back()->with('message','Berhasil menambahkan data buku.');
    }

    public function show_book()
    {
        $book = book::all();
        return view ('admin.show_book', compact('book'));
    }

    public function delete_book($id) 
    {
        $book = book::find($id);
        $book->delete();
        return redirect()->back()->with('message','Data buku berhasil dihapus.');
    }

    public function update_book($id)
    {   
        $book = book::find($id);
        $category = category::all();
        return view ('admin.update_book', compact('book','category'));
    }

    public function update_book_confirm(Request $request, $id)
    {
        $book = book::find($id);
        $book->category = $request->category;
        $book->title = $request->title;
        $book->writer = $request->writer;
        $book->description = $request->description;
        $book->publisher = $request->publisher;
        $book->date_published = $request->date_published;
        $book->format = $request->format;
        $book->isbn = $request->isbn;
        $book->quantity = $request->quantity;
        $image = $request->image;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('/book',$imagename);
            $book->image = $imagename;
        }

        $path = public_path('/book/' . $book->image);

            if(File::exists($path)) {
                File::delete($path);
            }

        $book->save();
        return redirect()->back()->with('message','Data buku berhasil di update.');

    }
}
