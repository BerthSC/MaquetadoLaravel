<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipoController extends Controller
{
    public function index()
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $equipos = DB::table('equipos')->get();
        return view('ListViews.listaEquipos', compact('equipos'));
    }

    public function create()
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        return view('RegisterViews.nuevoEquipo');
    }

    public function store(Request $request)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $request->validate([
            'descripcion' => 'required',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required',
            'medida' => 'required'
        ]);

        DB::table('equipos')->insert([
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'medida' => $request->medida,
            'fecha_registro' => now()
        ]);

        return redirect()->route('equipos.principal')
                         ->with('success', 'Equipo registrado correctamente');
    }

    public function edit($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $equipo = DB::table('equipos')->where('id_equipo', $id)->first();

        if (!$equipo) {
            return redirect()->route('equipos.principal')
                             ->with('error', 'El equipo no existe');
        }

        return view('RegisterViews.editarEquipo', compact('equipo'));
    }


    public function editar($id)
    {
        return $this->edit($id);
    }

    public function update(Request $request, $id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $request->validate([
            'descripcion' => 'required',
            'cantidad' => 'required|integer|min:1',
            'estado' => 'required',
            'medida' => 'required'
        ]);

        DB::table('equipos')->where('id_equipo', $id)->update([
            'descripcion' => $request->descripcion,
            'cantidad' => $request->cantidad,
            'estado' => $request->estado,
            'medida' => $request->medida
        ]);

        return redirect()->route('equipos.principal')
                         ->with('success', 'Equipo actualizado correctamente');
    }

    public function actualizar(Request $request, $id)
    {
        return $this->update($request, $id);
    }

    public function destroy($id)
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        DB::table('equipos')->where('id_equipo', $id)->delete();

        return redirect()->route('equipos.principal')
                         ->with('success', 'Equipo eliminado correctamente');
    }

    public function eliminar($id)
    {
        return $this->destroy($id);
    }
}
