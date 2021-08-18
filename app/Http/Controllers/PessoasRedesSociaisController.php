<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\PessoaRedeSocial;
use App\Models\Log;


class PessoasRedesSociaisController extends Controller
{
     public function index(){    
       	return PessoaRedeSocial::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return PessoaRedeSocial::find($request->id);
    }

    public function post(Request $request){    
        $data = new PessoaRedeSocial;

        $data->pessoa_id = $request->pessoa_id;
        $data->rede_social_id = $request->rede_social_id;
        $data->nome = $request->nome;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma Rede Social da Pessoa';
            $log->table = 'pessoas_redes_sociais';
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
       	$data = PessoaRedeSocial::find($request->id);
        $dataold = PessoaRedeSocial::find($request->id);

        $data->pessoa_id = $request->pessoa_id;
        $data->rede_social_id = $request->rede_social_id;
        $data->nome = $request->nome;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou uma Rede Social da Pessoa';
            $log->table = 'pessoas_redes_sociais';
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
       	$data = PessoaRedeSocial::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma Rede Social da Pessoa';
            $log->table = 'pessoas_redes_sociais';
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
