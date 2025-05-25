<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use App\Models\History;



class HomeController extends Controller
{
    public function index()
    {
        $book = Book::paginate(3);
        return view('home.userpage', compact('book'));
    }
    
    public function redirect()
    {
        $user_type = Auth::user()->user_type;
        if ($user_type == '1') 
        {
            return view('admin.home');
        } else 
        {
            $book = Book::paginate(3);
            return view('home.userpage', compact('book'));
        }
    }

    public function book_details($id) 
    {
        $book = book::find($id);
        return view('home.book_details', compact('book'));
    }

    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=Auth::user();

            $book=book::find($id);

            $cart=new cart;

            $cart->name=$user->name;

            $cart->email=$user->email;

            $cart->phone=$user->phone;

            $cart->address=$user->address;

            $cart->user_id=$user->id;

            $cart->book_title=$book->title;
            
            $cart->image=$book->image;

            $cart->book_id=$book->id;

            $cart->quantity=$request->quantity;

            $cart->save();

            return redirect()->back();

            
        }

        else

        {
            return redirect('login');
        }
    }

    public function show_cart() {

        if(Auth::id())
        {
            $id=Auth::user()->id;

            $cart=cart::where('user_id','=',$id)->get();

            return view('home.showcart', compact('cart'));
        }
        
        else
        {
            return redirect('login');
        }
    }

    public function borrow_history() {

        if(Auth::id())
        {
            $id=Auth::user()->id;

            $history=Order::where('user_id','=',$id)->get();
            
            return view('home.borrow_history', compact('history'));
        }
        
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();
    }

    public function borrow_book()
    {
        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();

        foreach($data as $data)
        {
            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->book_title=$data->book_title;
            $order->image=$data->image;
            $order->book_id=$data->book_id;

            $order->status_pinjam='terpinjam';

            $order->save();

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();
            
        }

        return redirect()->back()->with('message','Berhasil meminjam buku. Selamat membaca :)');
    }

   
    
}
