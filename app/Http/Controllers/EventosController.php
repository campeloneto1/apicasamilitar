<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Evento;
use App\Models\Log;

class EventosController extends Controller
{
    public function index2(){    
       	return Evento::orderBy('id', 'desc')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Evento::orderBy('id', 'desc')->get();
        }else{
            return Evento::where('orgao_id', $user->orgao_id)->orderBy('id', 'desc')->get();
        }
        
    }

    public function find(Request $request){    
       	return Evento::find($request->id);
    }

    public function post(Request $request){    
        $data = new Evento;

        $data->nome = $request->nome;
        $data->orgao_id = $request->orgao_id;
        $data->setor_id = $request->setor_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->evento_tipo_id = $request->evento_tipo_id;
        $data->cidade_id = $request->cidade_id;
        $data->estado_id = $request->estado_id;
        $data->observacao = $request->observacao;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um evento';
            $log->table = 'eventos';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          return 1;
        }else{
          return 2;
        }
    }

    public function put(Request $request){    
       	$data = Evento::find($request->id);
        $dataold = Evento::find($request->id);

        $data->nome = $request->nome;
        $data->orgao_id = $request->orgao_id;
        $data->setor_id = $request->setor_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->evento_tipo_id = $request->evento_tipo_id;
        $data->cidade_id = $request->cidade_id;
        $data->estado_id = $request->estado_id;
        $data->observacao = $request->observacao;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um evento';
            $log->table = 'eventos';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->object_old = $dataold;
            $log->save();
          return 1;
        }else{
          return 2;
        }
    }

    public function delete(Request $request){    
       	$data = Evento::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um evento';
            $log->table = 'eventos';
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
