<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Receber;
use Carbon\Carbon;
use Carbon\Month;
use Illuminate\Http\Request;

class ReceberController extends Controller
{
    public function receber($mes, $ano)
    {
        $anoAtual = (int) $ano;
        $mesNumero = $this->getMesNumero($mes);
    $receber = Receber::whereYear('data_recebido', $anoAtual)
        ->whereMonth('data_recebido', $mesNumero)
        ->get();
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
    private function getMesNumero(string $mesNome): int {
        $mesesDoAno = ['Janeiro' => 1, 'Fevereiro' => 2, 'Março' => 3, 'Abril' => 4, 'Maio' => 5, 'Junho' => 6, 'Julho' => 7, 'Agosto' => 8, 'Setembro' => 9, 'Outubro' => 10, 'Novembro' => 11, 'Dezembro' => 12];
        return $mesesDoAno[$mesNome] ?? 0; // Retorna 0 se o mês não for encontrado
    }
}
