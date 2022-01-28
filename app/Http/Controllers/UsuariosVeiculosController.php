<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\UserVeiculo;
use App\Models\Log;

class UsuariosVeiculosController extends Controller
{
   public function index2(){    
       	return UserVeiculo::get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return UserVeiculo::get();
        }else{
            return UserVeiculo::get();
        }
    }

    public function where(Request $request){    
        return UserVeiculo::where('placa', $request->id)
        ->orderBy('placa')->get();
    }

    public function find(Request $request){    
       	return UserVeiculo::find($request->id);
    }

    public function post(Request $request){    
        $data = new UserVeiculo;

       
        $data->marca_id = $request->marca_id;
        $data->modelo_id = $request->modelo_id;
        $data->user_id = $request->user_id;
        $data->cor_id = $request->cor_id;
        $data->veiculo_tipo_id = $request->veiculo_tipo_id;
        $data->placa = $request->placa;
       
        $data->key = bcrypt($request->placa);

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um veículo';
            $log->table = 'users_veiculos';
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
       	$data = UserVeiculo::find($request->id);
        $dataold = UserVeiculo::find($request->id);

        $data->marca_id = $request->marca_id;
        $data->modelo_id = $request->modelo_id;
        $data->user_id = $request->user_id;
        $data->cor_id = $request->cor_id;
        $data->veiculo_tipo_id = $request->veiculo_tipo_id;
        $data->placa = $request->placa;
       
        $data->key = bcrypt($request->placa);
        
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um veículo';
            $log->table = 'users_veiculos';
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
       	$data = UserVeiculo::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um veículo';
            $log->table = 'users_veiculos';
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
