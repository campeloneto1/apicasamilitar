<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\PostoGrad;
use App\Models\Log;

class PostoGradController extends Controller
{
    public function index(){    
       	return PostoGrad::orderBy('nome')->get();
    }

    public function find(Request $request){    
       	return PostoGrad::find($request->id);
    }

    public function post(Request $request){    
        $data = new PostoGrad;

        $data->nome = $request->nome;
        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um posto/grad';
            $log->table = 'posto_grads';
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
       	$data = PostoGrad::find($request->id);
        $dataold = PostoGrad::find($request->id);

        $data->nome = $request->nome;
       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um posto/grad';
            $log->table = 'posto_grads';
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
       	$data = PostoGrad::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um posto/grad';
            $log->table = 'posto_grads';
            $log->action = 2;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }
}
