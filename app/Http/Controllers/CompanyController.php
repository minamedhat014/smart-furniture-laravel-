<?php

namespace App\Http\Controllers;

use App\interfaces\showrooms\distRepoInterface;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  private $dist;

    //  public function __construct(distRepoInterface  $dist)
    //  {
    //     $this->dist = $dist;
    //  }

    //  public function index()
    // {

    // return  $this->dist->index();
    // }

    public function index()
    {
        return view('admin.showrooms.dist'); 
    }


}
