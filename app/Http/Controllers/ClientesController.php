<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteRequest;
use App\Models\Cliente;
use App\Models\ContatosCliente;
use App\Models\EnderecoCliente;
use App\validate\ValidarLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $clientes = Cliente::all();

        // Cliente::join('contatos_clientes', 'clientes.id', '=', 'contatos_clientes.cliente_id')
        //     ->select('clientes.*', 'contatos_clientes.celular', 'contatos_clientes.ddd')
        //     ->where('clientes.ativo', '=', 1)
        //     ->get();

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
    public function store(clienteRequest $request)
    {
        //
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

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
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $clientes = DB::select('SELECT clientes.* FROM clientes WHERE clientes.id = ? AND clientes.ativo = true', [$id]);
        $enderecos = DB::select('SELECT endereco_clientes.* FROM endereco_clientes WHERE endereco_clientes.cliente_id = ?', [$id]);
        $contatos = DB::select('SELECT contatos_clientes.* FROM contatos_clientes WHERE contatos_clientes.cliente_id = ?', [$id]);
        $dados = [
            'clientes' => $clientes,
            'enderecos' => $enderecos,
            'contatos' => $contatos
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
            return redirect()->route('login.create');
        }
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
            return redirect()->route('login.create');
        }
    }
}
