<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        // foreach ($menus as $menu) {
        //     $menuName = $menu->name;
        //     $categoryName = $menu->categories()->name;
        //     dd($categoryName);
        // }
        return view('menus.index', compact('menus'));
    }

}
