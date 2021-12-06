<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use App\validate\ValidarLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
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

        $categorias = DB::select('SELECT c.id, c.nome_categoria, sum(p.quantidade) as qunatidade_categoria FROM produtos p, categorias c 
        WHERE p.categoria_id = c.id
        AND c.ativo <> false
        GROUP BY c.nome_categoria, c.id
        ORDER BY c.id ASC');

        return view('categorias.index', compact('categorias'));
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

        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $categorias = Categoria::create($request->all());

        return json_encode($categorias);
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
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }

        if (isset($id)) {
            if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $id)) {
                return json_encode(['error' => 'Fornecedor não encontrado']);
            } else {

                $categorias = Categoria::findOrFail($id);
                if ($categorias == null) {
                    return json_encode(['error' => 'Fornecedor não encontrado']);
                }
                return json_encode($categorias);
            }
        } else {
            return json_encode(['error' => 'Não informado a chave de pesquisa']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
