<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = fornecedores::paginate(5);
        return view('fornecedores.index',array('fornecedores' => $fornecedores,'busca'=>null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fornecedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'cidade' => 'required',
            'estado' => 'required',
            'pais' => 'required',
        ]);
        $fornecedores = new fornecedores();
        $fornecedores->cidade = $request->input('cidade');
        $fornecedores->estado = $request->input('estado');
        $fornecedores->pais = $request->input('pais');
        if($fornecedores->save()){
            return redirect('fornecedores');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedores = fornecedores::find($id);
        return view('fornecedores.show',array('fornecedores' => $fornecedores));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fornecedor  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fornecedores = fornecedores::find($id);
        return view('fornecedores.edit', array('fornecedores' =>$fornecedores));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fornecedor  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'cidade' => 'required',
            'estado' => 'required',
            'pais' => 'required',
        ]);
        $fornecedores = fornecedores::find($id);
        $fornecedores->marca = $request->input('cidade');
            $fornecedores->modelo = $request->input('estado');
            $fornecedores->cor = $request->input('pais');
            if($fornecedores->save()) {
                Session::flash('mensagem','Fornecedor alterado com sucesso');
                return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fornecedor  $fornecedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $fornecedores = fornecedores::find($id);
        $fornecedores->delete();
        Session::flash('mensagem', 'Fornecedor Excluido com Sucesso');
        return redirect(url('fornecedores/'));
    
    }

    public function busca(Request $request){
        $fornecedoress = fornecedores::where('id','LIKE','%'.$request->input('busca').'%')->orwhere('id','LIKE','%'.$request->input('busca').'%')->paginate(5);
        return view('fornecedores.index',array('fornecedoress' => $fornecedoress,'busca'=>$request->input('busca')));
    }
}
