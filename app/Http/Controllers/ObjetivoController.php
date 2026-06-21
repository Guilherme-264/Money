<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Pago;
use App\Models\Receber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObjetivoController extends Controller
{
    public function objetivo()
    {
        $userId = Auth::id();
        $objetivos = Objetivo::where('user_id', $userId)->get();
        $pagos = Pago::where('user_id', $userId)->get();
        $receber = Receber::where('user_id', $userId)->get();
        $transferencias = $pagos->concat($receber);

        $arraytotal = [];

        foreach($objetivos as $objetivo){
            $total = 0;
            foreach($transferencias as $transferencia){
                if($transferencia->objetivo_id == $objetivo->id){
                    $total += $transferencia->valor;
                }
            }

            $arraytotal[] = [
                'label'   => $objetivo->nome,
                'valor'   => $total,
                'destino' => $objetivo->destino,
                'id'      => $objetivo->id
            ];
        }

        usort($arraytotal, function ($a, $b) {
            return $a['destino'] <=> $b['destino'];
        });

        $arrayLabel   = array_column($arraytotal, 'label');
        $arrayData    = array_column($arraytotal, 'valor');
        $arrayDestino = array_column($arraytotal, 'destino');
        $arrayId      = array_column($arraytotal, 'id');

        return view('objetivos.objetivo', compact('objetivos', 'transferencias', 'arrayLabel', 'arrayData', 'arrayDestino', 'arrayId'));
    }

    public function verObjetivo($id)
    {
        $objetivo = Objetivo::where('user_id', Auth::id())->findOrFail($id);

        if($objetivo->destino == 0){
            $transferencias = Pago::where('user_id', Auth::id())
                                  ->where('objetivo_id', $id)
                                  ->get();
        } else {
            $transferencias = Receber::where('user_id', Auth::id())
                                     ->where('objetivo_id', $id)
                                     ->get();
        }

        return view('objetivos.valoresObjetivos', compact('objetivo', 'transferencias'));
    }

    public function create()
    {
        return view('objetivos.create');
    }

    public function store(Request $request)
    {
        Objetivo::create([
            ...$request->all(),
            'user_id' => Auth::id(),
        ]);
        return redirect('pago')->with('success', 'Objetivo criado com sucesso.');
    }

    public function edit($id)
    {
        $objetivo = Objetivo::where('user_id', Auth::id())->findOrFail($id);
        return view('objetivos.edit', compact('objetivo'));
    }

    public function update(Request $request, $id)
    {
        $objetivo = Objetivo::where('user_id', Auth::id())->findOrFail($id);
        $objetivo->update($request->all());
        return redirect('objetivo')->with('success', 'Objetivo atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $objetivo = Objetivo::where('user_id', Auth::id())->findOrFail($id);
        $objetivo->delete();
        return redirect('pago')->with('success', 'Objetivo deletado com sucesso.');
    }
}