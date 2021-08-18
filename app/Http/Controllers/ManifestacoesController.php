<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Manifestacao;
use App\Models\Log;

class ManifestacoesController extends Controller
{
	public function index(){    
       	return Manifestacao::with('pessoas','veiculos', 'arquivos')->orderBy('data', 'desc')->get();
    }

     public function find(Request $request){    
       	return Manifestacao::with('pessoas','veiculos', 'arquivos')->find($request->id);
    }

    public function where(Request $request){    
        return Manifestacao::with('pessoas', 'veiculos', 'arquivos')
        ->where('nome','like','%'.$request->id.'%')
        ->orWhere('rua','like','%'.$request->id.'%')
        ->orderBy('data', 'desc')->get();
    }

    public function post(Request $request){    
        $data = new Manifestacao;

        $data->nome = $request->nome;     
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->manifestacao_tipo_id = $request->manifestacao_tipo_id;
        $data->tipo_id = $request->tipo_id;
        $data->previa = $request->previa;
        $data->sintese = $request->sintese;

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
            $log->mensagem = 'Cadastrou uma manifestação';
            $log->table = 'manifestacoes';
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
       	$data = Manifestacao::find($request->id);
        $dataold = Manifestacao::find($request->id);

         $data->nome = $request->nome;     
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->manifestacao_tipo_id = $request->manifestacao_tipo_id;
        
        $data->previa = $request->previa;
        $data->sintese = $request->sintese;
        $data->tipo_id = $request->tipo_id;

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
            $log->mensagem = 'Editou uma pessoa';
            $log->table = 'pessoas';
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
       	$data = Manifestacao::find($request->id);
         
         if($data->delete()){
             $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma manifestação';
            $log->table = 'manifestacoes';
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
