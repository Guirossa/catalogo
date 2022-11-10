<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use App\Models\Fornecedores;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $numFornecedores = Fornecedores::all()->count();
        $numCatalogo = Catalogo::all()->count();
        return view('home',array('numCatalogo'=>$numCatalogo,'numFornecedores'=>$numFornecedores));
    }
}