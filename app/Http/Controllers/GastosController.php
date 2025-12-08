<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastosController extends Controller
{
        public function index()
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $gastos = DB::table('gastos')->orderBy('idGasto', 'desc')->get();
        return view('ListViews.consultaGasto', compact('gastos'));
    }

    
    public function create()
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        return view('RegisterViews.nuevoGasto');
    }

    
    public function store(Request $request)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('gastos')->insert([
            'responsable' => $request->responsable,
            'fecha' => $request->fecha,
            'monto' => $request->monto,
            'concepto' => $request->concepto,
            'medida' => $request->medida
        ]);

        return redirect()->route('gastos.index')->with('status', 'Gasto registrado correctamente.');
    }

    
    public function edit($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $gasto = DB::table('gastos')->where('idGasto', $id)->first();
        return view('RegisterViews.editarGasto', compact('gasto'));
    }

   
    public function update(Request $request, $id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('gastos')->where('idGasto', $id)->update([
            'responsable' => $request->responsable,
            'fecha' => $request->fecha,
            'monto' => $request->monto,
            'concepto' => $request->concepto,
            'medida' => $request->medida
        ]);

        return redirect()->route('gastos.index')->with('status', 'Gasto actualizado correctamente.');
    }


    public function destroy($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('gastos')->where('idGasto', $id)->delete();
        return redirect()->route('gastos.index')->with('status', 'Gasto eliminado correctamente.');
    }
}
