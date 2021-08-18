<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Pessoa;
use App\Models\Log;
use Carbon\Carbon;


class PessoasController extends Controller
{
    public function index2(){    
       	return Pessoa::with('veiculos', 'manifestacoes', 'sindicatos')->orderBy('nome')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Pessoa::with('veiculos', 'manifestacoes', 'sindicatos')->orderBy('nome')->get();
        }else{
            return Pessoa::with('veiculos', 'manifestacoes', 'sindicatos')->orderBy('nome')->get();
        }
        
    }

    public function where(Request $request){    
        return Pessoa::with('veiculos', 'manifestacoes', 'sindicatos')
        ->where('nome','like','%'.$request->id.'%')
        ->orWhere('alcunha','like','%'.$request->id.'%')
        ->orWhere('cpf','like','%'.$request->id.'%')
        ->orWhere('mae','like','%'.$request->id.'%')
        ->orWhere('pai','like','%'.$request->id.'%')
        ->orWhere('email','like','%'.$request->id.'%')
        ->orWhere('rua','like','%'.$request->id.'%')
        ->orderBy('nome')->get();

        //->orWhere('mae','like','%'.$request->id.'%')
        //->orWhere('pai','like','%'.$request->id.'%')
    }

    public function where2(Request $request){    
        return Pessoa::where('cpf',$request->id)->get();

        //->orWhere('mae','like','%'.$request->id.'%')
        //->orWhere('pai','like','%'.$request->id.'%')
    }


    public function find(Request $request){    
       	return Pessoa::with('veiculos', 'manifestacoes', 'sindicatos')->find($request->id);
    }

    public function post(Request $request){    
        $data = new Pessoa;

        $data->nome = $request->nome;
        $data->cpf = $request->cpf;
        $data->alcunha = $request->alcunha;
        $data->data_nascimento = $request->data_nascimento;
        $data->pai = $request->pai;
        $data->mae = $request->mae;
        $data->influencia_id = $request->influencia_id;
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
        $data->key = bcrypt($request->cpf);
       
        $data->created_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma pessoa';
            $log->table = 'pessoas';
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
       	$data = Pessoa::find($request->id);
        $dataold = Pessoa::find($request->id);

         $data->nome = $request->nome;
        $data->alcunha = $request->alcunha;
        $data->cpf = $request->cpf;
        $data->data_nascimento = $request->data_nascimento;
        $data->pai = $request->pai;
        $data->mae = $request->mae;
        $data->influencia_id = $request->influencia_id;
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

        $data->key = bcrypt($request->cpf);
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

    public function digital(Request $request){    
        $data = Pessoa::find($request->id);
        $dataold = Pessoa::find($request->id);
         
        $data->digital = bcrypt($request->digital);
        
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma digital da pessoa';
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

    public function foto(Request $request){  
        if ($request->hasFile('image')){
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = $request->id.date('dmYHis')."e.".$extension;
            //move image to public/img folder
            $file->move(public_path('imagens'), $picture);


            $data = Pessoa::find($request->id);
            $dataold = Pessoa::find($request->id);
            $data->foto =  $picture;

            if($data->save()){
                $log = new Log;
                $log->user_id = Auth::id();
                $log->mensagem = 'Editou foto de uma pessoa';
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
        }else{
            return 2;
        }
  
        
    }

 

    public function delete(Request $request){    
       	$data = Pessoa::find($request->id);
         
         if($data->delete()){
             $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma pessoa';
            $log->table = 'pessoas';
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
