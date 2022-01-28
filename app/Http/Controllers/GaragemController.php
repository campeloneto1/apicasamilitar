<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Garagem;
use App\Models\EventoUsuario;
use App\Models\Log;
use Carbon\Carbon;

class GaragemController extends Controller
{
    public function index2(){    
       	return Garagem::orderBy('id', 'desc')->get();
    }

   public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Garagem::orderBy('id', 'desc')->get();
        }else{
            return Garagem::where('orgao_id', $user->orgao_id)->orderBy('id', 'desc')->get();
        }
        
    }

    public function registro(Request $request){    
        $date = Carbon::now();

        $data = new Garagem;

        $data->user_veiculo_id = $request->user_veiculo_id;
        $data->data = $date->year.'-'.$date->month.'-'.$date->day;
        $data->hora = $date->hour.':'.$date->minute.':'.$date->second;
        $data->posto_id = $request->posto_id;
        $data->orgao_id = $request->orgao_id;
        $data->created_by = Auth::id();        

        if($data->save()){
            

            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Registrou um acesso';
            $log->table = 'garagem';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();

          return 1;
        }else{
          return 2;
        }
    }

    public function post(Request $request){    
        $date = Carbon::now();

        $data = new Garagem;

        $data->user_veiculo_id = $request->user_veiculo_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->posto_id = $request->posto_id;
        $data->orgao_id = $request->orgao_id;
        $data->created_by = Auth::id();        

        if($data->save()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um acesso';
            $log->table = 'garagem';
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
        $data = Garagem::find($request->id);
        $dataold = Garagem::find($request->id);

        $data->user_veiculo_id = $request->user_veiculo_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->posto_id = $request->posto_id;
        $data->orgao_id = $request->orgao_id;
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um acesso';
            $log->table = 'garagem';
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
       	$data = Garagem::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um acesso';
            $log->table = 'garagem';
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
