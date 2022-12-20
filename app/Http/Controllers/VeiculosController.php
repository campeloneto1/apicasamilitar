<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Veiculo;
use App\Models\Log;

class VeiculosController extends Controller
{   //with('pessoas')->with('manifestacoes')->
    public function index2(){    
       	return Veiculo::with('pessoas', 'manifestacoes', 'sindicatos', 'arquivos')->orderBy('placa')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Veiculo::with('pessoas', 'manifestacoes', 'sindicatos', 'arquivos')->orderBy('placa')->get();
        }else{
            return Veiculo::with('pessoas', 'manifestacoes', 'sindicatos', 'arquivos')->orderBy('placa')->get();
        }
    }

    public function where(Request $request){    
        return Veiculo::with('pessoas', 'manifestacoes', 'sindicatos', 'arquivos')
        ->where('placa','like','%'.$request->id.'%')
        ->orWhere('renavam','like','%'.$request->id.'%')
        ->orWhere('chassi','like','%'.$request->id.'%')
        ->orderBy('placa')->get();
    }

     public function where2(Request $request){    
        return Veiculo::with('pessoas', 'manifestacoes', 'sindicatos', 'arquivos')
        ->where('placa','like','%'.$request->id.'%')
        ->orWhere('renavam','like','%'.$request->id.'%')
        ->orWhere('chassi','like','%'.$request->id.'%')
        ->orWhere('observacao','like','%'.$request->id.'%')
        ->orderBy('placa')->get();
    }

    public function find(Request $request){    
       	return Veiculo::with('pessoas', 'manifestacoes', 'sindicatos', 'arquivos')->find($request->id);
    }

    public function post(Request $request){    
        $data = new Veiculo;

        $data->codigo = $request->codigo;
        $data->marca_id = $request->marca_id;
        $data->modelo_id = $request->modelo_id;
        $data->pessoa_id = $request->pessoa_id;
        $data->cor_id = $request->cor_id;
        $data->veiculo_tipo_id = $request->veiculo_tipo_id;
        $data->placa = $request->placa;
        $data->renavam = $request->renavam;
        $data->chassi = $request->chassi;
        $data->observacao = $request->observacao;
        $data->key = bcrypt($request->placa);

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um veículo';
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
       	$data = Veiculo::find($request->id);
        $dataold = Veiculo::find($request->id);

        $data->codigo = $request->codigo;
       
        $data->marca_id = $request->marca_id;
        $data->modelo_id = $request->modelo_id;
        $data->veiculo_tipo_id = $request->veiculo_tipo_id;
        $data->pessoa_id = $request->pessoa_id;
        $data->placa = $request->placa;
        $data->cor_id = $request->cor_id;
        $data->renavam = $request->renavam;
        $data->chassi = $request->chassi;
        $data->observacao = $request->observacao;
        $data->key = bcrypt($request->placa);
        
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um veículo';
            $log->table = 'veiculos';
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
       	$data = Veiculo::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um veículo';
            $log->table = 'veiculos';
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
