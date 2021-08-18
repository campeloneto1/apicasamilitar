<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Orgao;
use App\Models\Log;

class OrgaosController extends Controller
{
    public function index2(){    
        
        
       	return Orgao::orderBy('nome')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Orgao::orderBy('nome')->get();
        }else{
            return Orgao::where('id', $user->orgao_id)->orderBy('nome')->get();
        }        
    }

    public function find(Request $request){    
       	return Orgao::find($request->id);
    }

    public function post(Request $request){    
        $data = new Orgao;

        $data->nome = $request->nome;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um orgão';
            $log->table = 'orgaos';
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
       	$data = Orgao::find($request->id);
        $dataold = Orgao::find($request->id);

        $data->nome = $request->nome;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um orgão';
            $log->table = 'orgaos';
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
       	$data = Orgao::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um orgão';
            $log->table = 'orgaos';
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
