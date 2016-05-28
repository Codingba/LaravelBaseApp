<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $menuParent = '';
        $menuChild = '';
        return view('admin.index', compact('menuParent', 'menuChild'));
    }
}
