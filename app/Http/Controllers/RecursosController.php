<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecursosController extends Controller
{
    public function index()
    {
        // Misma validación que usa Gastos
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $recursos = DB::table('recursos')->orderBy('id_recurso', 'desc')->get();
        return view('ListViews.consultaRecurso', compact('recursos'));
    }

    public function create()
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        return view('RegisterViews.nuevoRecurso');
    }

    public function store(Request $request)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('recursos')->insert([
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'fecha_recibo' => $request->fecha_recibo,
            'num_beneficiarios' => $request->num_beneficiarios,
            'nombre_representante' => $request->nombre_representante
        ]);

        return redirect()->route('recursos.index')->with('status', 'Recurso registrado correctamente.');
    }

    public function edit($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $recurso = DB::table('recursos')->where('id_recurso', $id)->first();
        return view('RegisterViews.editarRecurso', compact('recurso'));
    }

    public function update(Request $request, $id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('recursos')->where('id_recurso', $id)->update([
            'tipo' => $request->tipo,
            'cantidad' => $request->cantidad,
            'fecha_recibo' => $request->fecha_recibo,
            'num_beneficiarios' => $request->num_beneficiarios,
            'nombre_representante' => $request->nombre_representante
        ]);

        return redirect()->route('recursos.index')->with('status', 'Recurso actualizado correctamente.');
    }

    public function destroy($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('recursos')->where('id_recurso', $id)->delete();
        return redirect()->route('recursos.index')->with('status', 'Recurso eliminado correctamente.');
    }
}
