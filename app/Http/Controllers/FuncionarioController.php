<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionariosRequest;
use App\Models\Caixa;
use App\Models\Funcionarios;
use App\validate\ValidarLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
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
        if (session('funcionario')->nivel_acesso == 1) {
            $funcionarios = Funcionarios::all();
            return view('funcionario.index', compact('funcionarios'));
        }else {
            $funcionarios = Funcionarios::where('id', "!=", "1")->get();
            return view('funcionario.index', compact('funcionarios'));
        }
        
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionariosRequest $request)
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        if ($request->checado == "true") {
            $request->validate([
                "acess_level" => "required",
                "id_caixa" => "required",
                "senha" => "required",
                "confirma_senha" => "required",
            ]);
            if ($request->senha == $request->confirma_senha) {
                $funcionario = new Funcionarios();
                $funcionario->nome_funcionario = $request->nome_funcionario;
                $funcionario->cpf = $request->cpf;
                $funcionario->telefone = $request->telefone;
                $funcionario->endereco = $request->endereco;
                $funcionario->cargo = $request->cargo;
                $funcionario->salario = $request->salario;
                $funcionario->email = $request->email;
                $funcionario->senha = Hash::make($request->senha);
                $funcionario->nivel_acesso = $request->acess_level;
                $funcionario->id_caixa = $request->id_caixa;
                $funcionario->save();
                return json_encode($funcionario);
            } else {
                return redirect()->route('funcionario.create')->with('error', 'Senhas não conferem');
            }
        } else {
            $request->email = null;
            $request->senha = null;
            $request->confirma_senha = null;
            $request->id_caixa = null;

            $funcionario =  Funcionarios::create($request->all());
            return json_encode($funcionario);
        }
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
        $funcionario = Funcionarios::find($id);
        return json_encode($funcionario);
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

    public function getCaixas()
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }

        $caixa = Caixa::select("numero_caixa")->get();
        return json_encode($caixa);
    }
}
