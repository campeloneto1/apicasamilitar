<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\EventoUsuario;
use App\Models\Log;

class EventosUsuariosController extends Controller
{

    public function post(Request $request){  
        $erro = false ; 
        for ($i=0; $i < count($request->user_id); $i++) { 
          $data = new EventoUsuario;

          $data->evento_id = $request->evento_id;
          $data->user_id = $request->user_id[$i];
          $data->tipo_id = $request->tipo_id;
          $data->key = bcrypt($request->evento_id.$request->user_id[$i]);
          $data->created_by = Auth::id();  

          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma pessoa no evento';
            $log->table = 'eventos_users';
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
       	$data = EventoUsuario::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma pessoa no evento';
            $log->table = 'eventos_users';
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
