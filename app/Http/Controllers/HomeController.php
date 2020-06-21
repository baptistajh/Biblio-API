<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $atraso = DB::table('emprestimos')
        ->where('ativo', true)
        ->whereDate('dia_devolucao', '<', Carbon::today()->toDateString())
        ->get()
        ->count();

        $lemprestados = DB::table('livros')
        ->where('ativo', true)
        ->where('emprestado', true)
        ->get()
        ->count();

        $ldisponiveis = DB::table('livros')
        ->where('ativo', true)
        ->where('emprestado', false)
        ->get()
        ->count();

        DB::statement("SET lc_time_names = 'pt_BR'");
        $lmes = DB::table('emprestimos')
        ->select(DB::raw('MONTHNAME(dia_emprestimo) as mes, YEAR(dia_emprestimo) as ano, count(id) as livros'))
        ->groupBy(DB::raw('MONTHNAME(dia_emprestimo), YEAR(dia_emprestimo)'))
        ->get();

        return response()->json([
            'atrasos' => $atraso,
            'emprestados' => $lemprestados,
            'disponivel' => $ldisponiveis,
            'livrosmes' => $lmes
        ], 200);
    }
}
