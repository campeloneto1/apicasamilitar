<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Local;
use App\Models\Log;

class LocaisController extends Controller
{
    public function index(){    
       	return Local::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Local::find($request->id);
    }

    public function post(Request $request){    
        $data = new Local;

        $data->nome = $request->nome;
        $data->orgao_id = $request->orgao_id;
        $data->andar_id = $request->andar_id;
        $data->sala = $request->sala;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um local';
            $log->table = 'funcoes';
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
       	$data = Local::find($request->id);
        $dataold = Local::find($request->id);

         $data->nome = $request->nome;
        $data->orgao_id = $request->orgao_id;
        $data->andar_id = $request->andar_id;
        $data->sala = $request->sala;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou uma local';
            $log->table = 'funcoes';
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
       	$data = Local::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma local';
            $log->table = 'funcoes';
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
