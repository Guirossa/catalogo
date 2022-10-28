<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CatalogoController extends Controller
{
    public function index(){
        $data['titulo'] = "Minha página de Catalogo dinamica.";
        return view('catalogo',$data);
    }
}
