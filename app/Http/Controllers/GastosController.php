<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastosController extends Controller
{
    // ---------------------------------------------------------
    // LISTAR TODOS LOS GASTOS
    // ---------------------------------------------------------
    public function index()
    {
        // Validación de sesión
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $gastos = DB::table('gastos')->orderBy('idGasto', 'desc')->get();
        return view('ListViews.consultaGasto', compact('gastos'));
    }

    // ---------------------------------------------------------
    // FORMULARIO NUEVO GASTO
    // ---------------------------------------------------------
    public function create()
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        return view('RegisterViews.nuevoGasto');
    }

    // ---------------------------------------------------------
    // GUARDAR NUEVO GASTO
    // ---------------------------------------------------------
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

    // ---------------------------------------------------------
    // EDITAR GASTO
    // ---------------------------------------------------------
    public function edit($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $gasto = DB::table('gastos')->where('idGasto', $id)->first();
        return view('RegisterViews.editarGasto', compact('gasto'));
    }

    // ---------------------------------------------------------
    // ACTUALIZAR GASTO
    // ---------------------------------------------------------
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

    // ---------------------------------------------------------
    // ELIMINAR GASTO
    // ---------------------------------------------------------
    public function destroy($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('gastos')->where('idGasto', $id)->delete();
        return redirect()->route('gastos.index')->with('status', 'Gasto eliminado correctamente.');
    }
}
