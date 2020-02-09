<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\storage;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::get()->all();
        $Categorys = Category::get()->all();
        $storages = storage::get()->all();
        $users = User::get()->all();
        return view('home',compact('products','Categorys','storages','users'));
    }
    #Add new user form in admin
    protected function newRegistration(){
        return view('newuser');
    }

    #destroy user
    public function DestroyUser(User $user){
        $user->delete();
        return redirect()->back();
    }

    #show page 
    public function site(){
        $products = Product::paginate(10);
        return view('shop.product',compact('products'));
    }
}
