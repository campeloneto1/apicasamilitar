<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Modelo;
use App\Models\Log;

class ModelosController extends Controller
{
     public function index(){    
       	return Modelo::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Modelo::find($request->id);
    }

    public function where(Request $request){    
        return Modelo::where('marca_id', $request->id)->orderBy('nome')->get();
    }

    public function post(Request $request){    
        $data = new Modelo;

        $data->nome = $request->nome;
        $data->marca_id = $request->marca_id;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um modelo';
            $log->table = 'modelos';
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
       	$data = Modelo::find($request->id);
        $dataold = Modelo::find($request->id);

        $data->nome = $request->nome;
        $data->marca_id = $request->marca_id;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um modelo';
            $log->table = 'modelos';
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
       	$data = Modelo::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um modelo';
            $log->table = 'modelos';
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
