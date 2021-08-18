<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Viatura;
use App\Models\Log;


class ViaturasController extends Controller
{
     public function index2(){    
       	return Viatura::orderBy('placa')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Viatura::orderBy('placa')->get();
        }else{
            return Viatura::where('orgao_id', $user->orgao_id)->orderBy('placa')->get();
        }
    }

    public function where(Request $request){    
      
        return Viatura::where('orgao_id', $request->id)->orderBy('placa')->get();
        
    }

    public function find(Request $request){    
       	return Viatura::find($request->id);
    }

    public function post(Request $request){    
        $data = new Viatura;

        $data->codigo = $request->codigo;
        $data->orgao_id = $request->orgao_id;
        $data->setor_id = $request->setor_id;
        $data->marca_id = $request->marca_id;
        $data->modelo_id = $request->modelo_id;
        $data->veiculo_tipo_id = $request->veiculo_tipo_id;
        $data->cor_id = $request->cor_id;
        $data->placa = $request->placa;
        $data->renavam = $request->renavam;
        $data->chassi = $request->chassi;
        $data->km_inicial = $request->km_inicial;
        $data->km_atual = $request->km_inicial;
        $data->observacao = $request->observacao;
        $data->key = bcrypt($request->placa);

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma viatura';
            $log->table = 'veiculos';
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
       	$data = Viatura::find($request->id);
        $dataold = Viatura::find($request->id);

        $data->codigo = $request->codigo;
        $data->orgao_id = $request->orgao_id;
        $data->setor_id = $request->setor_id;
        $data->marca_id = $request->marca_id;
        $data->modelo_id = $request->modelo_id;
        $data->veiculo_tipo_id = $request->veiculo_tipo_id;
        $data->cor_id = $request->cor_id;
        $data->placa = $request->placa;
        $data->renavam = $request->renavam;
        $data->chassi = $request->chassi;
        $data->km_inicial = $request->km_inicial;
        $data->observacao = $request->observacao;
        $data->key = bcrypt($request->placa);
        
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou uma viatura';
            $log->table = 'viaturas';
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
       	$data = Viatura::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma viatura';
            $log->table = 'viaturas';
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
