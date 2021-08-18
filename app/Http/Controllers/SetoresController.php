<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Setor;
use App\Models\Log;

class SetoresController extends Controller
{
    public function index2(){    
       	return Setor::orderBy('nome')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Setor::orderBy('id', 'desc')->get();
        }else{
            return Setor::where('orgao_id', $user->orgao_id)->orderBy('id', 'desc')->get();
        }
        
    }

    public function find(Request $request){    
       	return Setor::find($request->id);
    }

    public function where(Request $request){    
        return Setor::where('orgao_id',$request->id)->get();
    }

    public function post(Request $request){    
        $data = new Setor;

        $data->nome = $request->nome;
        $data->andar_id = $request->andar_id;
        $data->sala = $request->sala;
        $data->orgao_id = $request->orgao_id;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um setor';
            $log->table = 'setores';
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
       	$data = Setor::find($request->id);
        $dataold = Setor::find($request->id);

        $data->nome = $request->nome;
        $data->andar_id = $request->andar_id;
        $data->sala = $request->sala;
        $data->orgao_id = $request->orgao_id;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um setor';
            $log->table = 'setores';
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
       	$data = Setor::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um setor';
            $log->table = 'setores';
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
