<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vegetables;

class ProductController extends Controller
{
    public function index(){
        $vegetable = Vegetables::all();
        return response()->json($vegetable);
    }
}
