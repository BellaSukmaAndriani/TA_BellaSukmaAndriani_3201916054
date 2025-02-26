<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $artikel = Artikel::where('user_id', '=', 5);
        // dd($artikel);
        return view('admin.index');
    }
}
