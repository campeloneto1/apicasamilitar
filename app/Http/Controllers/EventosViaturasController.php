<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\EventoViatura;
use App\Models\Viatura;
use App\Models\Log;


class EventosViaturasController extends Controller
{
    public function post(Request $request){  
        $erro = false ; 
        for ($i=0; $i < count($request->viatura_id); $i++) { 
        	$vei = Viatura::find($request->viatura_id[$i]);
          $data = new EventoViatura;

          $data->evento_id = $request->evento_id;
          $data->viatura_id = $request->viatura_id[$i];
          $data->km_inicial = $vei->km_atual;

          $data->created_by = Auth::id();  

          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma viatura no evento';
            $log->table = 'eventos_viaturas';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          }else{
            $erro = true;
          }
        }
              

        if($erro){
          return 2;
        }else{
          return 1;
        }
    }

    public function delete(Request $request){    
       	$data = EventoViatura::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma viatura no evento';
            $log->table = 'eventos_viaturas';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }
}
