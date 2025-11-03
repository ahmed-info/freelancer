<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class FrontController extends Controller
{
    public function home()
    {
        $categories = Category::latest()->get();
        return view('welcome', ['categories' => $categories]);
    }
}
