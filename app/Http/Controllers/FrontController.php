<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
class FrontController extends Controller
{
    public function home()
    {
        $fields = Field::latest()->get();
        return view('welcome', ['fields' => $fields]);
    }
}
