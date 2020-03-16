<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orcamento;

class OrcamentoController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $orc = Orcamento::orderBy('DataOrcamento', 'Desc')->paginate(5);
        return view('all', compact('orc'));
    }

    public function create()
    {
        return view('create');
    }

    public function edit($id)
    {
        $orc = Orcamento::find($id);
        return view('edit', compact('orc'));
    } 

    public function show($id)
    {
        $orc = Orcamento::find($id);
        return view('show', compact('orc'));
    } 

    public function search(Request $request)
    {
        switch ($request->get('tipo')){
            case '1':
                $orc = Orcamento::where('Cliente', 'like', $request->get('pesquisa').'%')->paginate(5);
                break;
            case '2':
                $orc = Orcamento::where('Vendedor', 'like', $request->get('pesquisa').'%')->paginate(5);
                break;                       
            default:
                 $orc = Orcamento::orderBy('DataOrcamento')->paginate(5);
                break;
        }       
        
        return view('all', compact('orc')); 
    
    }

    public function store(Request $request)
    {
        // Usando o date porquê não é necessário que o vendedor insira a data atual
        $date = date('Y/m/d h:i:s', time());

        $request->validate([
            'Cliente'           => 'required',
            'Vendedor'          => 'required',
            'Descricao'         => 'required',
            'Valor'             => 'required'
        ]);

        $orc = new Orcamento([
            'Cliente'           => $request->get('Cliente'),
            'DataOrcamento'     => $date,
            'Vendedor'          => $request->get('Vendedor'),
            'Descricao'         => $request->get('Descricao'),
            'Valor'             => $request->get('Valor')
        ]);

        $orc->save();
        return redirect('orcamentos')->with('success', 'Orçamento Cadastrado!');
    }  

    public function update(Request $request, $id)
    {
        $orc = Orcamento::find($id);

        $orc->Cliente = $request->get('Cliente');
        $orc->Vendedor = $request->get('Vendedor');        
        $orc->Descricao = $request->get('Descricao');   
        $orc->Valor = $request->get('Valor');

        $orc->save();

        return redirect('orcamentos')->with('success', 'Orçamento atualizado!');
    }

    public function destroy($id)
    {
        $orc = Orcamento::find($id);
        $orc->delete();

        return redirect()->back()->with('success', 'Orçamento Deletado!');
    }

    public function searchDate(Request $request)
    {
        $orc = Orcamento::whereBetween('DataOrcamento', [$request->get('de'), $request->get('ate')])->paginate(5);
        return view('all', compact('orc'));            
    }

}
