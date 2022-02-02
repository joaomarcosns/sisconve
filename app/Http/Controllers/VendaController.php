<?php

namespace App\Http\Controllers;

use App\Models\Caixa;
use App\Models\Cliente;
use App\Models\FormaPagamento;
use App\Models\ItemVenda;
use App\Models\PagamentoVenda;
use App\Models\Produtos;
use App\Models\Venda;
use App\validate\ValidarLogin;
use Database\Seeders\Produto;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class VendaController extends Controller
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

        $vendas = Venda::select('venda.*', 'clientes.nome as nome_cliente')
            ->join('clientes', 'clientes.id', '=', 'venda.cliente_id')
            ->get();

        return view('venda.index', compact('vendas'));
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
        return view('venda.create');
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

        $valorTotal = 0.0;
        $produtos = $request->id_produto;
        $quantidades = $request->quantidade_produto;
        $cliente = $request->cliente;
        $forma_pagamento = $request->metodo_pagamento;
        $parcelas = $request->num_parcelas;


        if (empty($produtos)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum produto foi selecionado');
        } elseif (empty($cliente)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum Cliente foi selecionado');
        } elseif (empty($forma_pagamento)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum metodo de pagamento foi selecionado');
        } elseif (empty($parcelas)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum numero de parcelas foi selecionado');
        }


        for ($i=0; $i < count($produtos); $i++) { 
            $produto = Produtos::find($produtos[$i]);

            if ($produto->quantidade < $quantidades[$i]) {
                return redirect()->route('compra.create')->with('error', 'Quantidade de produto insuficiente');
            }

            $valorTotal += $produto->preco_venda * $quantidades[$i];
        }

        $venda = new Venda();
        $venda->caixa_id = session('funcionario')->numero_caixa;
        $venda->cliente_id = $cliente;
        $venda->valor_total = $valorTotal;
        $venda->parcela = $parcelas;
        $venda->devolvido = 0;
        $venda->save();

        $pagamentoVenda = new PagamentoVenda();
        $pagamentoVenda->venda_id = $venda->id;
        $pagamentoVenda->forma_pagamento_id = $forma_pagamento;
        $pagamentoVenda->parcela = $parcelas;
        if ($parcelas == 1) {
            $pagamentoVenda->data_pagamento = date('Y-m-d');
            $pagamentoVenda->status = 'Pago';
            $pagamentoVenda->valor_pago = $valorTotal;
        } else {
            $pagamentoVenda->valor_pago = 0;
            $pagamentoVenda->data_pagamento = date('Y-m-d', strtotime('+1 month'));
        }
        $pagamentoVenda->save();

        for ($i=0; $i < count($produtos); $i++) { 
            $itemVenda = new ItemVenda();
            $itemVenda->venda_id = $venda->id;
            $itemVenda->produto_id = $produtos[$i];
            $itemVenda->quantidade = $quantidades[$i];
            $itemVenda->valor_unitario = Produtos::find($produtos[$i])->preco_venda;
            $itemVenda->valor_total = $itemVenda->valor_unitario * $itemVenda->quantidade;
            $itemVenda->save();

            $produto = Produtos::find($produtos[$i]);
            $produto->quantidade -= $quantidades[$i];
            $produto->save();
        }

        $caixa = Caixa::find(session('funcionario')->numero_caixa);
        $caixa->valor_em_caixa += $valorTotal;
        $caixa->save();

        return redirect()->route('venda.create')->with('success', 'Venda realizada com sucesso');
        
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

    public function getAll() {
        $clientes  = Cliente::select('id', 'nome')
        ->where('ativo', '=', 1)
        ->get();

        $produto = Produtos::select('id', 'nome_produto as nome', 'preco_venda', 'quantidade')
        ->where('ativo', '=', 1)
        ->get();

        $metoPagamento = FormaPagamento::select('id', 'tipo_pagamento as nome')->get();
        
        $dados = [
            'clientes' => $clientes,
            'produtos' => $produto,
            'metoPagamento' => $metoPagamento
        ];

        return json_encode($dados);
    }
}
