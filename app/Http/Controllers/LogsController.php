<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Log;


class LogsController extends Controller
{
    public function index(){    
       	return Log::orderBy('id', 'desc')->get();
    }

    public function post(Request $request){    
        $data = new Log;

        $data->user_id = $request->user_id;
        $data->mensagem = $request->mensagem;
        $data->table = $request->table;
        $data->fk = $request->fk;
        $data->action = $request->action;
        $data->object = $request->object;
        $data->object_old = $request->object_old;
        $data->created_by = Auth::id();        

        if($data->save()){
          return 1;
        }else{
          return 2;
        }
    }

    public function delete(Request $request){    
       	$data = Log::find($request->id);
         
         if($data->delete()){
            return 1;
          }else{
            return 2;
          }
    }
}
