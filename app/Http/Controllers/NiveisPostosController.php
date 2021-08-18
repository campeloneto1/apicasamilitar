<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\NivelPosto;
use App\Models\Log;

class NiveisPostosController extends Controller
{
    public function post(Request $request){    
       $erro = false ; 
        for ($i=0; $i < count($request->posto_id); $i++) { 
          $data = new NivelPosto;

          $data->nivel_id = $request->nivel_id;
          $data->posto_id = $request->posto_id[$i];
          $data->created_by = Auth::id();  

          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um posto no nivel';
            $log->table = 'niveis_postos';
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
       	$data = NivelPosto::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um posto do nivel';
            $log->table = 'niveis_postos';
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
