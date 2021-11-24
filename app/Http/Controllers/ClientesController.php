<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ContatosCliente;
use App\Models\EnderecoCliente;
use App\validate\ValidarLogin;
use Illuminate\Http\Request;

class ClientesController extends Controller
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

        $clientes = Cliente::join('contatos_clientes', 'clientes.id', '=', 'contatos_clientes.cliente_id')
            ->select('clientes.*', 'contatos_clientes.celular', 'contatos_clientes.ddd')
            ->where('clientes.ativo', '=', 1)
            ->get();

        return view('clientes.index', compact('clientes'));
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
            return redirect()->route('login.create');
        }
        return view('clientes.create');
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
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $request->validate([
            'nome' => 'required|max:255',
            'data_nacimento' => 'required|date',
            'cpf' => 'required',
            'cep' => 'required',
            'email' => 'required|max:255',
            'ddd' => 'required|max:2',
            'telefone' => 'required',
            'rua' => 'required|max:255',
            'numero' => 'required|max:10',
            'bairro' => 'required|max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:2',
        ]);

        $clientes = new Cliente();
        $clientes->nome = $request->nome;
        $clientes->cpf = $request->cpf;
        $clientes->data_nacimento = $request->data_nacimento;
        $clientes->save();
        
        $contatos = new ContatosCliente();
        $contatos->cliente_id = $clientes->id;
        $contatos->ddd = $request->ddd;
        $contatos->celular = $request->telefone;
        $contatos->email = $request->email;
        $contatos->save();

        $endereco = new EnderecoCliente();
        $endereco->cliente_id = $clientes->id;
        $endereco->cep = $request->cep;
        $endereco->complemento = $request->complemento;
        $endereco->logradouro = $request->rua;
        $endereco->numero = $request->numero;
        $endereco->bairro = $request->bairro;
        $endereco->cidade = $request->cidade;
        $endereco->uf = $request->estado;
        $endereco->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
