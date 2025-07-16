<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Pago;
use App\Models\Receber;
use Illuminate\Http\Request;

class ObjetivoController extends Controller
{
    public function objetivo()
    {
        
        $objetivos = Objetivo::all();
        $pagos = Pago::all();
        $receber = Receber::all();
        $transferencias = $pagos->concat($receber);
        
    
        return view('objetivos.objetivo', compact('objetivos', 'transferencias'));
    }

    public function verObjetivo($id){
        $objetivo = Objetivo::findOrFail($id);
        if($objetivo->destino == 0){
            $transferencias = Pago::all();

        }else{
            $transferencias = Receber::all();
        }

        
       

    
        return view('objetivos.valoresObjetivos', compact('objetivo', 'transferencias'));
    }
    
    
    public function create()
    {
        return view('Objetivos.create');
    }
    
    public function store(Request $request)
    {
        Objetivo::create($request->all());
        return redirect('pago')->with('success', 'objetivo created successfully.');
    }
    
    public function edit($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        return view('objetivos.edit', compact('objetivo'));
    }
    
    public function update(Request $request, $id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->update($request->all());
        return redirect('objetivo')->with('success', 'Objetivo updated successfully.');
    }
    
    public function destroy($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $objetivo->delete();
        return redirect('pago')->with('success', 'Objetivo deleted successfully.');
    }
}
