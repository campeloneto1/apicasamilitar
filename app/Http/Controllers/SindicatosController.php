<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Sindicato;
use App\Models\Log;


class SindicatosController extends Controller
{
    public function index(){    
       	return Sindicato::with('pessoas','veiculos', 'arquivos')->orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return Sindicato::with('pessoas','veiculos', 'arquivos')->find($request->id);
    }

     public function where(Request $request){    
        return Sindicato::with('pessoas', 'veiculos', 'arquivos')
        ->where('nome','like','%'.$request->id.'%')
        ->orWhere('email','like','%'.$request->id.'%')
        ->orWhere('rua','like','%'.$request->id.'%')
        ->orderBy('nome')->get();
    }

    public function post(Request $request){    
        $data = new Sindicato;

        $data->tipo_id = $request->tipo_id;
        $data->nome = $request->nome;
      
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;
        $data->email = $request->email;

        $data->cep = $request->cep;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;

        $data->observacao = $request->observacao;
        $data->key = bcrypt($request->nome);
       
        $data->created_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um sindicato';
            $log->table = 'sindicatos';
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
       	$data = Sindicato::find($request->id);
        $dataold = Sindicato::find($request->id);

        $data->tipo_id = $request->tipo_id;
        $data->nome = $request->nome;
       
        $data->telefone1 = $request->telefone1;
        $data->telefone2 = $request->telefone2;
        $data->email = $request->email;

        $data->cep = $request->cep;
        $data->rua = $request->rua;
        $data->numero = $request->numero;
        $data->bairro = $request->bairro;
        $data->complemento = $request->complemento;
        $data->estado_id = $request->estado_id;
        $data->cidade_id = $request->cidade_id;       
        $data->observacao = $request->observacao;

        $data->key = bcrypt($request->nome);
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um sindicato';
            $log->table = 'sindicatos';
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
       	$data = Sindicato::find($request->id);
         
         if($data->delete()){
             $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um Sindicato';
            $log->table = 'sindicatos';
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
