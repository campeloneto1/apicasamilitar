<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\VeiculoTipo;
use App\Models\Log;

class VeiculosTiposController extends Controller
{
    public function index(){    
       	return VeiculoTipo::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return VeiculoTipo::find($request->id);
    }

    public function post(Request $request){    
        $data = new VeiculoTipo;

        $data->nome = $request->nome;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um tipo de veículo';
            $log->table = 'veiculos_tipos';
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
       	$data = VeiculoTipo::find($request->id);
        $dataold = VeiculoTipo::find($request->id);

        $data->nome = $request->nome;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um tipo de veículo';
            $log->table = 'veiculos_tipos';
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
       	$data = VeiculoTipo::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um tipo de veículo';
            $log->table = 'veiculos_tipos';
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
