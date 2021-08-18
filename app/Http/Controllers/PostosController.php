<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Posto;
use App\Models\Log;


class PostosController extends Controller
{
    public function index2(){    
       	return Posto::orderBy('nome')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Posto::orderBy('nome')->get();
        }else{
            return Posto::where('orgao_id', $user->orgao_id)->orderBy('nome')->get();
        }
        
    }

    public function find(Request $request){    
       	return Posto::find($request->id);
    }

    public function acesso(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Posto::where('acesso', 1)->orderBy('nome')->get();
        }else{
            return Posto::where('acesso', 1)->where('orgao_id', $user->orgao_id)->orderBy('nome')->get();
        }
        
    }

    public function where(Request $request){    
        return Posto::where('orgao_id', $request->id)->orderBy('nome')->get();
    }

    public function post(Request $request){    
        $data = new Posto;

        $data->nome = $request->nome;
        $data->orgao_id = $request->orgao_id;
        $data->acesso = $request->acesso;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um posto';
            $log->table = 'postos';
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
       	$data = Posto::find($request->id);
        $dataold = Posto::find($request->id);

        $data->nome = $request->nome;
        $data->orgao_id = $request->orgao_id;
        $data->acesso = $request->acesso;
       	$data->updated_by = Auth::id();

        if($data->save()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um posto';
            $log->table = 'postos';
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
       	$data = Posto::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um posto';
            $log->table = 'postos';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }
}
