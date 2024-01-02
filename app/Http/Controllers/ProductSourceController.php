<?php

namespace App\Http\Controllers;

use App\Models\productSource;
use Illuminate\Http\Request;

class ProductSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    

        return view('admin.general settings.proSource');
    }

   
}
