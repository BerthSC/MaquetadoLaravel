<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ParcelasController extends Controller
{
    public function create(Request $request)
    {
        try {
            $usos = DB::table('usos')->get();
            $parcela = null;
            $ejidatario = null;

            if ($request->has('idParcela')) {
                $parcela = DB::table('parcelas')
                    ->where('noParcela', $request->idParcela)
                    ->first();

                if (!$parcela) {
                    return redirect()->back()->with('noParcela', true);
                }
            }

            if ($request->has('numeroEjidatario')) {
                $ejidatario = DB::table('ejidatarios')
                    ->where('numeroEjidatario', $request->numeroEjidatario)
                    ->first();

                if (!$ejidatario) {
                    return redirect()->back()->with('noEjidatario', true);
                }
            }

            return view('RegisterViews.nuevaParcela', [
                'usos' => $usos,
                'parcela' => $parcela,
                'ejidatario' => $ejidatario
            ]);
        } catch (\Exception $e) {
            Log::error('Error en create parcela: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Hubo un error en el servidor');
        }
    }

    public function store(Request $request)
    {
        $MensajeError = '';

        try {
           DB::beginTransaction();

            $FilaParcela = DB::table('parcelas')->insert([
                'noParcela' => $request->noParcela,
                'superficie' => $request->superficie,
                'ubicacion' => $request->ubicacion,
                'idEjidatario' => $request->idEjidatario,
                'idUso' => $request->usoSuelo
            ]);
          

            if($FilaParcela)
            {
                $idParcela = DB::table('parcelas')
                    ->max("idParcela");
                
                $idColinndancia=DB::table('colindancias')->insert([
                'norte' => $request->norte,
                'sur' => $request->sur,
                'este' => $request->este,
                'oeste' => $request->oeste,
                'noreste' => $request->noreste,
                'noroeste' => $request->noroeste,
                'sureste' => $request->sureste,
                'suroeste' => $request->suroeste,
                'idParcela' => $idParcela
            ]);
            
            if ($idColinndancia){
                foreach ($request->punto as $i => $p) {
                    DB::table('coordenadas')->insert([
                        'idParcela' => $idParcela,
                        'punto' => $p,
                        'coordenadaX' => $request->coordenadaX[$i],
                        'coordenadaY' => $request->coordenadaY[$i]
                    ]);
                }

                $idInf=DB::table('infoadministrativa')->insert([
                    'num_inscripcionRAN' => $request->num_inscripcionRAN,
                    'claveNucleoAgrario' => $request->claveNucleoAgrario,
                    'comunidad' => $request->comunidad ?? '',
                    'fechaExpedicion' => $request->fechaExpedicion,
                    'idParcela' => $idParcela
                ]);

                if ($idInf){

                    db::commit();
                    
                    $MensajeError = 'Parcela registrada correctamente';
                    return redirect('/nuevaP')
                        ->with('sessionInsertado', 'true')
                        ->with('mensaje', $MensajeError);

                }
                else{
                    DB::rollBack();
                    $MensajeError = 'Hubo un error en el servidor';
                    return redirect('/nuevaP')
                    ->with('sessionInsertado', 'false')
                    ->with('mensaje', $MensajeError);
                }
                
            }
            else
            {
                DB::rollBack();
                $MensajeError = 'Hubo un error en el servidor';
                return redirect('/nuevaP')
                    ->with('sessionInsertado', 'false')
                    ->with('mensaje', $MensajeError);
            }
        }
        else
        {

             DB::rollBack();
            $MensajeError = 'Hubo un error en el servidor';
                return redirect('/nuevaP')
                    ->with('sessionInsertado', 'false')
                    ->with('mensaje', $MensajeError);

        }

        } catch (\Exception $e) {

            DB::rollBack();
            $MensajeError = 'Hubo un error en el servidor';
            return redirect('/nuevaP')
                ->with('sessionInsertado', 'false')
                ->with('mensaje', $MensajeError);
        }
    }

    public function show() {}

    public function edit($id) {}

    public function update($id) {}

    public function destroy($id) {}
}
