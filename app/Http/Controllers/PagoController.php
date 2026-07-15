<?php

namespace App\Http\Controllers;

use App\Models\Objetivo;
use App\Models\Pago;
use App\Models\Receber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagoController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $mesAtual = Carbon::now()->month;
        $anoAtual = Carbon::now()->year;

        $pagos = Pago::where('user_id', $userId)
                    ->whereYear('data_recebido', $anoAtual)
                    ->whereMonth('data_recebido', $mesAtual)
                    ->get();
        $total_pago = 0;
        foreach($pagos as $pago){
            $total_pago += $pago->valor;
        }

        $receber = Receber::where('user_id', $userId)
                    ->whereYear('data_recebido', $anoAtual)
                    ->whereMonth('data_recebido', $mesAtual)
                    ->get();
        $total_receber = 0;
        foreach($receber as $entity){
            $total_receber += $entity->valor;
        }

        $total = $total_receber - $total_pago;

        $data = Carbon::createFromDate($anoAtual, $mesAtual, 1);
        Carbon::setLocale('pt_BR');
        $mesEscrito = ucfirst($data->translatedFormat('F'));

        $total = number_format($total, 2, ',', '.');
        $total_pago = number_format($total_pago, 2, ',', '.');
        $total_receber = number_format($total_receber, 2, ',', '.');

        return view('pagos.index', compact('pagos', 'total_pago', 'total_receber', 'total', 'mesEscrito', 'anoAtual'));
    }

    public function meses(Request $request, $ano = null)
    {
        $userId = Auth::id();
        $totalPagoAno = 0;
        $totalRecebidoAno = 0;
        $meses = [];
        $anoAtual = $request->ano ?? $ano ?? date('Y');

        $liquidoPorMes = [];
        $pagos = Pago::where('user_id', $userId)->whereYear('data_recebido', $anoAtual)->get();
        $receber = Receber::where('user_id', $userId)->whereYear('data_recebido', $anoAtual)->get();

        for($i = 1; $i <= 12; $i++){
            $mesPago = $pagos->filter(function ($pago) use ($i) {
                return Carbon::parse($pago->data_recebido)->month === $i;
            });
            $totalPagoMes = 0;
            foreach($mesPago as $entity){
                $totalPagoMes += $entity->valor;
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
                'mes'     => $this->getMes($i),
                'pago'    => $totalPagoMes,
                'receber' => $totalRecebidoMes,
                'liquido' => $liquido
            ];
            $mesesDoAno = array_column($meses, 'mes');
            $liquidoPorMes[] = $liquido;
        }

        $liquidoAno = $totalRecebidoAno - $totalPagoAno;

        return view('pagos.meses', compact('pagos', 'receber', 'meses', 'totalRecebidoAno', 'totalPagoAno', 'liquidoAno', 'anoAtual', 'mesesDoAno', 'liquidoPorMes'));
    }

    public function pago($mes, $ano)
    {
        $userId = Auth::id();
        $anoInt = (int) $ano;
        $mesNumero = $this->getMesNumero($mes);

        $pagos = Pago::where('user_id', $userId)
            ->whereYear('data_recebido', $anoInt)
            ->whereMonth('data_recebido', $mesNumero)
            ->get();
        $total_pago = 0;
        foreach($pagos as $pago){
            $total_pago += $pago->valor;
        }

        return view('pagos.pago', compact('pagos', 'total_pago'));
    }

    public function create()
    {
        $objetivos = Objetivo::where('user_id', Auth::id())->get();
        if ($objetivos->isEmpty()) {
            return redirect('objetivo/create')->
            with('aviso', 'Você precisa criar um objetivo antes de criar um gasto.')->
            with('objetivo-sugerido', '0');
        }
        else{
            return view('pagos.create', compact('objetivos'));
        }
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

        Pago::create([
            ...$request->all(),
            'user_id' => Auth::id(),
        ]);

        return redirect('pago')->with('success', 'Pago criado com sucesso.');
    }

    public function edit($id)
    {
        $pago = Pago::where('user_id', Auth::id())->findOrFail($id);
        $objetivos = Objetivo::where('user_id', Auth::id())->get();
        return view('pagos.edit', compact('pago', 'objetivos'));
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

        $pago = Pago::where('user_id', Auth::id())->findOrFail($id);
        $pago->update($request->all());
        return redirect('pago')->with('success', 'Pago atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $pago = Pago::where('user_id', Auth::id())->findOrFail($id);
        $pago->delete();
        return redirect('pago')->with('success', 'Pago deletado com sucesso.');
    }

    private function getMes(int $mesNumero): string
    {
        $mesesDoAno = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        return $mesesDoAno[$mesNumero - 1];
    }

    private function getMesNumero(string $mesNome): int
    {
        $mesesDoAno = ['Janeiro' => 1, 'Fevereiro' => 2, 'Março' => 3, 'Abril' => 4, 'Maio' => 5, 'Junho' => 6, 'Julho' => 7, 'Agosto' => 8, 'Setembro' => 9, 'Outubro' => 10, 'Novembro' => 11, 'Dezembro' => 12];
        return $mesesDoAno[$mesNome] ?? 0;
    }
}