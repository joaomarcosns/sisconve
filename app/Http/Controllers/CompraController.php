<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\FormaPagamento;
use App\Models\Fornecedor;
use App\Models\ItemCompra;
use App\Models\PagamentoCompra;
use App\Models\Produtos;
use App\validate\ValidarLogin;
use Database\Seeders\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
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
        $compras = Compra::select("compra.id", "compra.valor_total", "compra.created_at", "fornecedores.nome_fantasia", "funcionarios.nome_funcionario")
            ->join("fornecedores", "fornecedores.id", "=", "compra.fornecedor_id")
            ->join("funcionarios", "funcionarios.id", "=", "compra.funcionario_id")
            ->get();

        return view('compra.index', compact('compras'));
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
        return view('compra.create');
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

        $produtos = $request->input('produto_id');
        $quantidade = $request->input('quantidade-produto');
        $valor_unitario = $request->input('valor-unitario');
        $parcela = $request->input('parcelas');
        $fornecedor_id = $request->input('fornecedor_id');
        $forma_pagamento_id = $request->input('metodo-pagamento');
        $acrescimo_despesas = 0.4;
        $ipi = $request->input('ipi');
        $icms = $request->input('icms');
        $frete = $request->input('frete');
        $preco_compra = 0.0;
        $preco_venda = 0.0;

        if (empty($produtos)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum produto foi selecionado');
        } elseif (empty($fornecedor_id)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum fornecedor foi selecionado');
        } elseif (empty($forma_pagamento_id)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum metodo de pagamento foi selecionado');
        } elseif (empty($parcela)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum numero de parcelas foi selecionado');
        } elseif (empty($valor_unitario)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum valor unitario foi selecionado');
        } elseif (empty($quantidade)) {
            return redirect()->route('compra.create')->with('error', 'Nenhuma quantidade foi selecionada');
        }elseif (empty($ipi)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum valor de IPI foi selecionado');
        }elseif (empty($icms)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum valor de ICMS foi selecionado');
        }elseif (empty($frete)) {
            return redirect()->route('compra.create')->with('error', 'Nenhum valor de frete foi selecionado');
        }

        for ($i = 0; $i < count($produtos); $i++) {
            $ipiFloatval = floatval($ipi[$i]);
            $icmsFloatval = floatval($icms[$i]);
            $freteFloatval = floatval($frete[$i]);
            $valorUnitarioFloatval = floatval($valor_unitario[$i]);
            $quantidadeInt = intval($quantidade[$i]);

            $preco_compra += (($ipiFloatval + $icmsFloatval + $freteFloatval) + $valorUnitarioFloatval) * $quantidadeInt;
            $preco_venda += (($ipiFloatval + $icmsFloatval + $freteFloatval + $acrescimo_despesas) + $valorUnitarioFloatval) * $quantidadeInt;
        }


        $compra = new Compra();
        $compra->funcionario_id = session('funcionario')->id;
        $compra->fornecedor_id = $fornecedor_id;
        $compra->valor_total =  floatval(number_format($preco_compra, 2));
        $compra->parcela = intval($parcela);
        $compra->save();

        $pagamentoCompra = new PagamentoCompra();
        $pagamentoCompra->compra_id = $compra->id;
        $pagamentoCompra->forma_pagamento_id = $forma_pagamento_id;
        $pagamentoCompra->parcela = intval($parcela);

        if (intval($parcela) == 1) {
            $pagamentoCompra->valor_pago = floatval(number_format($preco_compra, 2));
            $pagamentoCompra->data_pagamento = date('Y-m-d H:i:s');
            $pagamentoCompra->status = 'Pago';
        } else {
            $pagamentoCompra->valor_pago = 0.0;
            $pagamentoCompra->data_pagamento = date('Y-m-d H:i:s');
        }
        $pagamentoCompra->save();

        for ($i = 0; $i < count($produtos); $i++) {
            // $ipiFloatval = floatval($ipi[$i]);
            // $icmsFloatval = floatval($icms[$i]);
            // $freteFloatval = floatval($frete[$i]);
            // $valorUnitarioFloatval = floatval($valor_unitario[$i]);

            $itemCompra = new ItemCompra();
            $itemCompra->compra_id = $compra->id;
            $itemCompra->produto_id = $produtos[$i];
            $itemCompra->quantidade = $quantidade[$i];
            $itemCompra->preco_na_fabrica = $valor_unitario[$i];
            $itemCompra->preco_compra = $preco_compra;
            $itemCompra->preco_venda = $preco_venda;
            $itemCompra->lucro = $preco_venda - $preco_compra;
            $itemCompra->ipi = $ipi[$i];
            $itemCompra->icms = $icms[$i];
            $itemCompra->frete = $frete[$i];
            $itemCompra->acrescimo_despesas = $acrescimo_despesas;
            $itemCompra->desconto = 0.0;
            $itemCompra->save();


            $produto = Produtos::findOrFail($produtos[$i]);
            $produto->icms = $icms[$i];
            $produto->ipi = $ipi[$i];
            $produto->frete = $frete[$i];
            $produto->preco_na_fabrica = $valor_unitario[$i];
            $produto->preco_compra = $preco_compra;
            $produto->preco_venda = $preco_venda;
            $produto->lucro = $preco_venda - $preco_compra;
            $produto->acrescimo_despesas = $acrescimo_despesas;
            $produto->desconto = 0.0;
            $produto->quantidade += $quantidade[$i];

            $produto->save();
        }

        return redirect()->route('compra.create')->with('success', 'Compra realizada com sucesso');
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

    public function getAll()
    {
        if (!ValidarLogin::verificaSessao()) {
            return redirect()->route('login.create');
        }
        $fornecedor = Fornecedor::select('id', 'nome_fantasia')
            ->where('status', '=', 1)
            ->get();
        $produto = Produtos::select('id', 'nome_produto')
            ->where('ativo', '=', 1)
            ->get();
        $metoPagamento = FormaPagamento::select('id', 'tipo_pagamento')->get();
        $dados = [
            'fornecedores' => $fornecedor,
            'produtos' => $produto,
            'metodosPagamentos' => $metoPagamento
        ];

        return json_encode($dados);
    }
}
