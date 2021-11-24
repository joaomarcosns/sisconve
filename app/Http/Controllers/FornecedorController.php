<?php

namespace App\Http\Controllers;

use App\Http\Requests\fornecedorRequest;
use App\Models\Fornecedor;
use App\validate\ValidarLogin;
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
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }
        $fornecedor = Fornecedor::all();
        return view('fornecedor.index', ['fornecedores' => $fornecedor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }
        return view('fornecedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(fornecedorRequest $request)
    {
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }

        $request->validated();

        $fornecedor = new Fornecedor($request->all());
        return json_encode($fornecedor->save());
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
                $fornecedor = Fornecedor::findOrFail($id);
                if ($fornecedor == null) {
                    return json_encode(['error' => 'Fornecedor não encontrado']);
                }
                return json_encode($fornecedor);
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
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }
        $fornecedor = Fornecedor::findOrFail($id);
        return json_encode($fornecedor);
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
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }
        return json_encode(Fornecedor::findOrFail($id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }
        Fornecedor::findorfail($id)->delete();
        return json_encode('success', 'Fornecedor excluído com sucesso!');
    }
}
