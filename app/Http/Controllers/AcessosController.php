<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Acesso;
use App\Models\EventoUsuario;
use App\Models\Log;
use Carbon\Carbon;


class AcessosController extends Controller
{
    public function index2(){    
       	return Acesso::orderBy('id', 'desc')->get();
    }

   public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Acesso::orderBy('id', 'desc')->get();
        }else{
            return Acesso::where('orgao_id', $user->orgao_id)->orderBy('id', 'desc')->get();
        }
        
    }

    public function registro(Request $request){    
        $date = Carbon::now();

        $data = new Acesso;

        $data->user_id = $request->user_id;
        $data->data = $date->year.'-'.$date->month.'-'.$date->day;
        $data->hora = $date->hour.':'.$date->minute.':'.$date->second;
        $data->posto_id = $request->posto_id;

        $data->orgao_id = $request->orgao_id;
        $data->observacao = $request->observacao;
        $data->created_by = Auth::id();        

        if($data->save()){
            $event = EventoUsuario::with('evento')->where('user_id', $request->user_id)->whereHas('evento', function (Builder $query) use ($date) {
                                                                            $query->where('data', '=', $date->year.'-'.$date->month.'-'.$date->day);
                                                                        })->get();

            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Registrou um acesso';
            $log->table = 'acessos';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();

            if(count($event) > 0){
                for ($i=0; $i < count($event); $i++) { 
                    $upt = EventoUsuario::find($event[$i]->id);
                    $uptold = EventoUsuario::find($event[$i]->id);
                    $upt->presente = 1;
                    $upt->data = $date->year.'-'.$date->month.'-'.$date->day;
                    $upt->hora = $date->hour.':'.$date->minute.':'.$date->second;
                    $upt->save();

                    $log2 = new Log;
                    $log2->user_id = Auth::id();
                    $log2->mensagem = 'Registrou uma presença';
                    $log2->table = 'eventos_usuarios';
                    $log2->action = 2;
                    $log2->fk = $event[$i]->id;
                    $log2->object = $upt;
                    $log2->object_old = $uptold;
                    $log2->save();
                }
            }
          return 1;
        }else{
          return 2;
        }
    }

    public function post(Request $request){    
        $date = Carbon::now();

        $data = new Acesso;

        $data->user_id = $request->user_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->posto_id = $request->posto_id;
        $data->orgao_id = $request->orgao_id;
        $data->created_by = Auth::id();        

        if($data->save()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um acesso';
            $log->table = 'acessos';
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
        $data = Acesso::find($request->id);
        $dataold = Acesso::find($request->id);

        $data->user_id = $request->user_id;
        $data->data = $request->data;
        $data->hora = $request->hora;
        $data->posto_id = $request->posto_id;
        $data->orgao_id = $request->orgao_id;
        $data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um acesso';
            $log->table = 'acessos';
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
       	$data = Acesso::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um acesso';
            $log->table = 'cidades';
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
