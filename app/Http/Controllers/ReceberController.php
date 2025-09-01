<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Receber;
use Carbon\Carbon;
use Carbon\Month;
use Illuminate\Http\Request;

class ReceberController extends Controller
{
    public function index()
    {
        $mesAtual = Carbon::now()->month;
        $receber = Receber::all();
        $total_receber = 0;
    foreach( $receber as $entity){
        $total_receber += $entity->valor;
    }
        return view('pagos.index', compact('receber', 'total_receber'));
    }

    public function receber()
    {
        $receber = Receber::all();
        $total = 0;
    foreach( $receber as $entity){
        $total += $entity->valor;
    }
        return view('receber.receber', compact('receber', 'total'));
    }
    
    public function create()
    {
        $objetivos = Objetivo::all();
        return view('receber.create', compact('objetivos'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nome'=> 'required',
            'valor' => 'required',
            'descricao' => 'required',
            'data_recebido' => 'required',
            'objetivo_Id' => 'required'
        ]);
        Receber::create($request->all());
        return redirect('pago')->with('success', value: 'Receber created successfully.');
    }
    
    public function edit($id)
    {
        $receber = Receber::findOrFail($id);
        $objetivos = Objetivo::all();

        return view('receber.edit', compact('receber', 'objetivos'));
    }
    
    public function update(Request $request, $id)
    {
        $receber = Receber::findOrFail($id);
        $receber->update($request->all());
        return redirect('pago')->with('success', 'Receber updated successfully.');
    }
    
    public function destroy($id)
    {
        $receber = Receber::findOrFail($id);
        $receber->delete();
        return redirect('pago')->with('success', 'Receber deleted successfully.');
    }
    }
