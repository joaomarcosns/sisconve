<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produtos;
use App\validate\ValidarLogin;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }
        $produtos = Produtos::select('produtos.*', 'categorias.nome_categoria')
            ->join('categorias', 'categorias.id', '=', 'produtos.categoria_id')
            ->where('produtos.ativo', '=', '1')
            ->get();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }
        $categorias = Categoria::where('ativo', '=', '1')->get();
        return json_encode($categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }
        $produto = Produtos::create($request->all());
        return json_encode($produto);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $produto = Produtos::find($id);
        $categoria = Produtos::find($id)->categoria()->where("id", "=", $produto->categoria_id)->get("nome_categoria");
           
        $dados = [
            'nome' => $produto->nome_produto,
            'categoria' => $categoria[0]->nome_categoria,
        ];
        return json_encode($dados);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $produto = Produtos::find($id);
        $categoria = Categoria::find($produto->categoria_id);

        $dados = [
            'idProduto' => $produto->id,
            'nome' => $produto->nome_produto,
            'categoria_id' => $categoria->id,
            'categoria' => $categoria->nome_categoria
        ];
        return json_encode($dados);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $produto = Produtos::find($request->id_update);
        $produto->nome_produto = $request->nome_produto;
        $produto->categoria_id = $request->categoria;
        $produto->save();

        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $produto = Produtos::find($request->id_delete);
        $produto->ativo = false;
        $produto->save();
        
        return redirect()->route('produto.index')->with('success', 'Produto excluído com sucesso'); 
    }
    
}
