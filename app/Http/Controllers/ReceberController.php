<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Receber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceberController extends Controller
{
    public function receber($mes, $ano)
    {
        $userId = Auth::id();
        $anoAtual = (int) $ano;
        $mesNumero = $this->getMesNumero($mes);

        $receber = Receber::where('user_id', $userId)
            ->whereYear('data_recebido', $anoAtual)
            ->whereMonth('data_recebido', $mesNumero)
            ->get();
        $total = 0;
        foreach($receber as $entity){
            $total += $entity->valor;
        }

        return view('receber.receber', compact('receber', 'total'));
    }

    public function create()
    {
        $objetivos = Objetivo::where('user_id', Auth::id())->get();
        foreach($objetivos as $objetivo){
            if($objetivo->destino == 1){
                return view('receber.create', compact('objetivos'));

            }
        }
            return redirect('objetivo/create')->
            with('aviso', 'Você precisa criar um objetivo antes de criar um receber.')->
            with('objetivo-sugerido', '1');
        

        return view('receber.create', compact('objetivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'         => 'required',
            'valor'        => 'required',
            'descricao'    => 'required',
            'data_recebido'=> 'required',
            'objetivo_id'  => 'required'
        ],
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'valor.required' => 'O campo valor é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'data_recebido.required' => 'O campo data de recebimento é obrigatório.',
            'objetivo_id.required' => 'O campo objetivo é obrigatório.'
        ]);

        Receber::create([
            ...$request->all(),
            'user_id' => Auth::id(),
        ]);

        return redirect('pago')->with('success', 'Receber criado com sucesso.');
    }

    public function edit($id)
    {
        
        $receber = Receber::where('user_id', Auth::id())->findOrFail($id);
        $objetivos = Objetivo::where('user_id', Auth::id())->get();
        return view('receber.edit', compact('receber', 'objetivos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome'         => 'required',
            'valor'        => 'required',
            'descricao'    => 'required',
            'data_recebido'=> 'required',
            'objetivo_id'  => 'required'
        ],
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'valor.required' => 'O campo valor é obrigatório.',
            'descricao.required' => 'O campo descrição é obrigatório.',
            'data_recebido.required' => 'O campo data de recebimento é obrigatório.',
            'objetivo_id.required' => 'O campo objetivo é obrigatório.'
        ]);

        $receber = Receber::where('user_id', Auth::id())->findOrFail($id);
        $receber->update($request->all());
        return redirect('pago')->with('success', 'Receber atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $receber = Receber::where('user_id', Auth::id())->findOrFail($id);
        $receber->delete();
        return redirect('pago')->with('success', 'Receber deletado com sucesso.');
    }

    private function getMesNumero(string $mesNome): int
    {
        $mesesDoAno = ['Janeiro' => 1, 'Fevereiro' => 2, 'Março' => 3, 'Abril' => 4, 'Maio' => 5, 'Junho' => 6, 'Julho' => 7, 'Agosto' => 8, 'Setembro' => 9, 'Outubro' => 10, 'Novembro' => 11, 'Dezembro' => 12];
        return $mesesDoAno[$mesNome] ?? 0;
    }
}