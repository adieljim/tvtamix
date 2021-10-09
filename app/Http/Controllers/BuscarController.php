<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archivo;
use App\Models\InfoGeneral;
use Exception;

class BuscarController extends Controller
{
    public  function autocompletaBusqueda(Request $request)
    {

        $term = $request->get('term');
        $param = $request->get('param');

        $querys = "";
        $data = [];

        if ($param == 'personajes_principales'){
            $querys = InfoGeneral::select('personajes_principales')
                ->where($param, 'LIKE', '%'.$term.'%')
                ->get();

            foreach ($querys as $query) {
                $data[] =[
                    'label' => $query->personajes_principales
                ];
            }
        } else {
            $querys = Archivo::select('titulo_original')
                ->where($param, 'LIKE', '%'.$term.'%')
                ->get();

            foreach ($querys as $query) {
                $data[] = [
                    'label' => $query->titulo_original
                ];
            }
        }

        return $data;
    }

    public function buscar(Request $request){
        $term = $request->get('term');
        $param = $request->get('param');
        try{
           if(!empty($term)){
                if ($param == 'personajes_principales'){
                    $querys = Archivo::select('*')
                    ->join('ficha_tecnica', function ($join) {
                        $join->on('archivos.id', '=', 'ficha_tecnica.id');
                    })
                    ->join('info_general', function ($join) {
                        $join->on('archivos.id', '=', 'info_general.id');
                    })
                    ->where('info_general.'.$param, 'LIKE', '%'.$term.'%')
                    ->get();

                    return response()->json([
                        "error" => false,
                        "archivo" => $querys
                    ]);

                }

                if($param == 'titulo_original') {
                    $querys = Archivo::select('*')
                        ->join('ficha_tecnica', function ($join) {
                            $join->on('archivos.id', '=', 'ficha_tecnica.id');
                        })
                        ->join('info_general', function ($join) {
                            $join->on('archivos.id', '=', 'info_general.id');
                        })
                        ->where('archivos.'.$param, 'LIKE', '%'.$term.'%')
                        ->get();

                    return response()->json([
                        "error" => false,
                        "archivo" => $querys
                    ]);
                }
           } else {
                return response()->json([
                    "error" => false,
                    "archivo" => []
                ]);
           }

        } catch(Exception $e){
            return response()->json([
                "error" => true,
                "mensaje" => $e->getMessage()
            ]);
        }

    }
}
