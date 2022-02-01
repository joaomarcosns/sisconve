<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\validate\ValidarLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $clientes = DB::table('clientes')->count();

        $produtosAbaixoEstoque = DB::select("SELECT p.id, p.nome_produto, p.preco_venda, p.quantidade,c.nome_categoria from produtos p, categorias c
        where c.id = p.categoria_id
        and p.quantidade <= 10
        ");


        $produtoMaisVendidos = DB::select("SELECT p.id, p.nome_produto, p.preco_venda ,COUNT(iv.produto_id) as quantidade from item_venda iv
        INNER JOIN venda v on v.id = iv.venda_id
        INNER JOIN produtos p on p.id = iv.produto_id
        GROUP BY iv.produto_id, p.id, p.nome_produto, p.preco_venda
        ");
        $agora = date('Y-m-d');

        $cardVenda = DB::table("venda")->where('created_at','LIKE','%'.$agora.'%')->count();
        $cardRecolhidos = DB::table("venda")->where('created_at','LIKE','%'.$agora.'%')->sum('valor_total');

        return view('dashboard.index', compact('clientes', 'produtosAbaixoEstoque', 'produtoMaisVendidos', 'cardVenda', 'cardRecolhidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }
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
            session()->flash('error', 'É nessesario fazer login');
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
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
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
    }

    public function graficoUm()
    {
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }

        $nome = [];
        $quantidade = [];
        $cor = [];

        $produto = DB::table('produtos')->select("nome_produto", "quantidade")->where('quantidade', '<=', "10")->get();

        foreach ($produto as $produtos) {
            $nome[] = $produtos->nome_produto;
            $quantidade[] = $produtos->quantidade;
            $cor[] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }

        // $clientes = DB::table('clientes')->count();

        return json_encode(compact("nome", "quantidade", "cor"));
    }

    public function graficoDois()
    {
        if (!ValidarLogin::verificaSessao()) {
            session()->flash('error', 'É nessesario fazer login');
            return redirect()->route('login.create');
        }
        $nome = [];
        $quantidade = [];
        $cor = [];

        $produtoMaisVendidos = DB::select("SELECT p.id, p.nome_produto, p.preco_venda ,COUNT(iv.produto_id) as quantidade from item_venda iv
        INNER JOIN venda v on v.id = iv.venda_id
        INNER JOIN produtos p on p.id = iv.produto_id
        GROUP BY iv.produto_id, p.id, p.nome_produto, p.preco_venda
        ");

        foreach ($produtoMaisVendidos as $produtos) {
            $nome[] = $produtos->nome_produto;
            $quantidade[] = $produtos->quantidade;
            $cor[] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
        }

        return json_encode(compact("nome", "quantidade", "cor"));
    }


}
