<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    // public function show(Item $item) {
    //     return view('item/show', ['item' => $item]);
    // }
    
    public function show() {
        return view('admin.item.show');
    }
}
