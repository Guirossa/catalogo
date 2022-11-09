<?php

namespace App\Http\Controllers;

use App\Models\Catalogo;
use Illuminate\Http\Request;
use Session;

class CatalogoController extends Controller
{
    public function index(){
        $catalogos = Catalogo::paginate(5);
        return view('catalogo.index',array('catalogos' => $catalogos,'busca'=>null));
    }

    public function show($id){

        $catalogo = Catalogo::find($id);
        return view('catalogo.show',array('catalogo' => $catalogo));
    }

    public function store(Request $request) {
        $this->validate($request,[
            'marca' => 'required',
            'modelo' => 'required',
            'cor' => 'required',
            'preco' => 'required',
        ]);
        $catalogo = new Catalogo();
        $catalogo->marca = $request->input('marca');
        $catalogo->cor = $request->input('cor');
        $catalogo->modelo = $request->input('modelo');
        $catalogo->preco = $request->input('preco');
        if($catalogo->save()){
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($catalogo->id).".".$imagem->getClientOriginalExtension();
                //dd($imagem, $nomearquivo,$catalogo->id);
                $request->file('foto')->move(public_path('./img/catalogo/'),$nomearquivo);
            }
        }
            return redirect('catalogo');
    }

    public function create(){
        return view('catalogo.create');
    }

    public function edit($id){
        $catalogo = Catalogo::find($id);
        return view('catalogo.edit', array('catalogo' =>$catalogo));

    }

    public function destroy(Request $request, $id)
    {
        $catalogo = Catalogo::find($id);
        if (isset($request->foto)){
            unlink($request->foto);
        }
        $catalogo->delete();
        Session::flash('mensagem', 'Produto Excluido com Sucesso');
        return redirect(url('catalogo/'));
    }

    public function buscar(Request $request) {
        $catalogos = Catalogo::where('id','LIKE','%'.$request->input('busca').'%')->orwhere('id','LIKE','%'.$request->input('busca').'%')->paginate(5);
        return view('catalogo.index',array('catalogos' => $catalogos,'busca'=>$request->input('busca')));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
            $this->validate($request,[
                'marca' => 'required',
                'modelo' => 'required',
                'cor' => 'required',
                'preco' => 'required',
            ]);
            $catalogo = Catalogo::find($id);
            if($request->hasfile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($catalogo->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\catalogo'),$nomearquivo);
            }
            $catalogo->marca = $request->input('marca');
            $catalogo->modelo = $request->input('modelo');
            $catalogo->cor = $request->input('cor');
            $catalogo->preco = $request->input('preco');
            if($catalogo->save()) {
                Session::flash('mensagem','Produto alterado com sucesso');
                return redirect()->back();
            }
        }
            
}
