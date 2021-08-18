<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Log;
use Carbon\Carbon;

class UsuariosController extends Controller
{
   public function index2(){    
       	return User::orderBy('nome')->get();
    }

    public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return User::orderBy('nome')->get();
        }else{
            return User::where('orgao_id', $user->orgao_id)->orderBy('nome')->get();
        }
        
    }

    public function where(){    
        return User::where('acesso', 1)->orderBy('nome')->get();
    }


    public function proxeventos(Request $request){    
         $date = Carbon::now();
        return User::find($request->id)->eventos()->where('eventos.data', '>=', $date->year.'-'.$date->month.'-'.$date->day)->orderBy('eventos.data')->get();
    }

    public function find(Request $request){    
       	return User::with(['acessos','eventos'])->find($request->id);
    }

    public function post(Request $request){    
        $data = new User;

        $data->nome = $request->nome;
        $data->nome_guerra = $request->nome_guerra;
        $data->cpf = $request->cpf;
        $data->data_nascimento = $request->data_nascimento;
        $data->posto_grad_id = $request->posto_grad_id;
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

        $data->orgao_id = $request->orgao_id;
        $data->setor_id = $request->setor_id;
        $data->funcao_id = $request->funcao_id;
        $data->perfil_id = $request->perfil_id;
        $data->nivel_id = $request->nivel_id;
        $data->observacao = $request->observacao;

        $data->key = bcrypt($request->cpf);
        $data->usuario = $request->cpf;
        $data->password = bcrypt('casamilitar');
        $data->acesso = 1;

        $data->created_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um usuario';
            $log->table = 'usuarios';
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
       	$data = User::find($request->id);
        $dataold = User::find($request->id);

         $data->nome = $request->nome;
        $data->nome_guerra = $request->nome_guerra;
        $data->cpf = $request->cpf;
        $data->data_nascimento = $request->data_nascimento;
        $data->posto_grad_id = $request->posto_grad_id;
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

        $data->orgao_id = $request->orgao_id;
        $data->setor_id = $request->setor_id;
        $data->funcao_id = $request->funcao_id;
        $data->perfil_id = $request->perfil_id;
        $data->nivel_id = $request->nivel_id;
        $data->observacao = $request->observacao;

        $data->key = bcrypt($request->cpf);
        $data->usuario = $request->cpf;

        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um usuario';
            $log->table = 'usuarios';
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
        $data = User::find($request->id);
        $dataold = User::find($request->id);
         
        $data->digital = bcrypt($request->digital);
        
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma digital';
            $log->table = 'usuarios';
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
            $picture   = $request->id.date('dmYHis').".".$extension;
            //move image to public/img folder
            $file->move(public_path('imagens'), $picture);


            $data = User::find($request->id);
            $dataold = User::find($request->id);
            $data->foto =  $picture;

            if($data->save()){
                $log = new Log;
                $log->user_id = Auth::id();
                $log->mensagem = 'Editou foto de usuário';
                $log->table = 'usuarios';
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

    public function acesso_ativar(Request $request){    
        $data = User::find($request->id);
        $dataold = User::find($request->id);
         
        $data->acesso = 1;
        
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Deu permissão de acesso';
            $log->table = 'usuarios';
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

    public function acesso_desativar(Request $request){    
        $data = User::find($request->id);
        $dataold = User::find($request->id);
         
        $data->acesso = 0;
        
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Retirou permissão de acesso';
            $log->table = 'usuarios';
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

    public function reset_password(Request $request){    
        $data = User::find($request->id);
        $dataold = User::find($request->id);
         
        $data->password = bcrypt('casamilitar');
        
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Resetou a senha de acesso';
            $log->table = 'usuarios';
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

    public function change_password(Request $request){    
        $data = User::find($request->id);
        $dataold = User::find($request->id);
         
        $data->password = bcrypt($request->password);
        
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Alterou a senha de acesso';
            $log->table = 'usuarios';
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
       	$data = User::find($request->id);
         
         if($data->delete()){
             $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um usuario';
            $log->table = 'usuarios';
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
