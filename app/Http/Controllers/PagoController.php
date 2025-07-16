<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Pago;
use App\Models\Receber;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function index()
{
    
    $pagos = Pago::all();
    $total_pago = 0;
    foreach( $pagos as$pago){
        $total_pago += $pago->valor;
    }

    $receber = Receber::all();
    $total_receber = 0;
    foreach( $receber as $entity){
        $total_receber += $entity->valor;
    }
    $total = 0;
    $total = $total_receber - $total_pago;

    return view('pagos.index', compact('pagos', 'total_pago','total_receber', 'total'));
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
}
