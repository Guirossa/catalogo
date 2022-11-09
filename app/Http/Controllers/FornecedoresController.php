<?php

namespace App\Http\Controllers;

use App\Models\fornecedores;
use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedores::paginate(5);
        return view('fornecedores.index',array('fornecedores' => $fornecedores,'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fornecedores  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function show(fornecedores $fornecedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fornecedores  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function edit(fornecedores $fornecedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fornecedores  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fornecedores $fornecedores)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fornecedores  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(fornecedores $fornecedores)
    {
        //
    }
}
