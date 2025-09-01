<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Pago;
use App\Models\Receber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
{
    
    $mesAtual = Carbon::now()->month;
    $anoAtual = Carbon::now()->year;
    $pagos = Pago::whereYear('data_recebido', $anoAtual)
                ->whereMonth('data_recebido', $mesAtual)
                ->get();
    $total_pago = 0;
    foreach( $pagos as$pago){
        $total_pago += $pago->valor;
    }

    $receber = Receber::whereYear('data_recebido', $anoAtual)
                ->whereMonth('data_recebido', $mesAtual)
                ->get();
    $total_receber = 0;
    foreach( $receber as $entity){
        $total_receber += $entity->valor;
    }
    $total = 0;
    $total = $total_receber - $total_pago;

    $data = Carbon::createFromDate($anoAtual, $mesAtual, 1);
    Carbon::setLocale('pt_BR');
    $mesEscrito = $data->translatedFormat('F');
    $mesEscrito = ucfirst($mesEscrito); // Capitalize the first letter

    return view('pagos.index', compact('pagos', 'total_pago','total_receber', 'total', 'mesEscrito', 'anoAtual'));
}

    public function meses()
    {
    $totalPagoAno = 0;
    $totalRecebidoAno = 0;
    $meses = [];
    $anoAtual = Carbon::now()->year;
    $pagos = Pago::whereYear('data_recebido', $anoAtual)->get();
    $receber = Receber::whereYear('data_recebido', $anoAtual)->get();
    
    for($i = 1; $i <= 12; $i++){

        $mesPago = $pagos->filter(function ($pago) use ($i) {
            return Carbon::parse($pago->data_recebido)->month === $i;
        });
        $totalPagoMes = 0;
        foreach($mesPago as $entity){
            $totalPagoMes += $entity-> valor;
        }
        $totalPagoAno += $totalPagoMes;
            
        $mesReceber = $receber->filter(function($recebe) use ($i){
            return Carbon::parse($recebe->data_recebido)->month === $i;
        });
        $totalRecebidoMes = 0;
        foreach($mesReceber as $entity){
            $totalRecebidoMes += $entity->valor;
        }
        $totalRecebidoAno += $totalRecebidoMes;

        $liquido = $totalRecebidoMes - $totalPagoMes;

        $meses[$i] = [
            'mes' => $this->getMes($i),
            'pago' => $totalPagoMes,      
            'receber' => $totalRecebidoMes,
            'liquido' => $liquido
        ];
            

    }
    $liquidoAno = $totalRecebidoAno - $totalPagoAno;
  

    return view('pagos.meses', compact('pagos', 'receber', 'meses','totalRecebidoAno','totalPagoAno', 'liquidoAno', 'anoAtual'));
    }

public function pago()
{
    
    $pagos = Pago::all();
    $total_pago = 0;
    foreach( $pagos as$pago){
        $total_pago += $pago->valor;
    }

    return view('pagos.pago', compact('pagos', 'total_pago'));
}

public function create()
{
    $objetivos = Objetivo::all();
    return view('pagos.create', compact('objetivos'));
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
    Pago::create($request->all());
    return redirect('pago')->with('success', 'Pago created successfully.');
}

public function edit($id)
{
    $pago = Pago::findOrFail($id);
    $objetivos = Objetivo::all();

    return view('pagos.edit', compact('pago', 'objetivos'));
}

public function update(Request $request, $id)
{
    $pago = Pago::findOrFail($id);
    $pago->update($request->all());
    return redirect('pago')->with('success', 'Pago updated successfully.');
}

public function destroy($id)
{
    $pago = Pago::findOrFail($id);
    $pago->delete();
    return redirect('pago')->with('success', 'Pago deleted successfully.');
}
private function getMes(int $mesNumero):string{
    $mesesDoAno = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    return $mesesDoAno[$mesNumero - 1];
    }    
}
