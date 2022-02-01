<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Models\Funcionarios;
use App\validate\ValidarLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (ValidarLogin::verificaSessao()) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('login.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (ValidarLogin::verificaSessao()) {
            return redirect()->route('dashboard.index');
        }

        $error = session('error');
        $data = [];

        if (!empty($error)) {
            $data = [
                'error' => $error
            ];
        }
        return view('login/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(loginRequest $request)
    {
        if(!$request->isMethod('post')){
            return redirect()->route('dashboard.index');
        }

        if (ValidarLogin::verificaSessao()) {
            return redirect()->route('dashboard.index');
        }

        $request->validated();

        $email = trim($request->email);
        $senha = trim($request->senha);
        $funcionario = Funcionarios::where("email", $email)->first();
        
        if ($funcionario && Hash::check($senha, $funcionario->senha)) {
            $funcionarioSession = DB::table('funcionarios as f')
            ->select('f.id', 'f.nome_funcionario', 'f.nivel_acesso', 'f.telefone', 
            'f.endereco', 'f.cargo', 'f.salario', 'f.email', 'f.ativo', 
            'c.numero_caixa')
            ->join('caixas as c', 'f.id_caixa', '=', 'c.id')
            ->where('f.id', $funcionario->id)
            ->first();

            session()->put('funcionario', $funcionarioSession);
            return redirect()->route('dashboard.index');
        } else {
            session()->flash('error', 'Usuario ou senha incorretos');
            return redirect()->route('login.create');
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
    public function destroy()
    {
        //
        if(ValidarLogin::verificaSessao()){
            session()->forget('funcionario');
            return redirect()->route('login.create');
        }
    }

}
