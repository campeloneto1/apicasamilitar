<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Acesso;
use App\Models\Viatura;

class RelatoriosController extends Controller
{
    public function acessos(Request $request){    
    	$data = Acesso::where('orgao_id', $request->orgao_id)->where('data','>=', $request->data_ini)->where('data','<=', $request->data_fim);

    	if($request->posto_id){
    		$data->where('posto_id', $request->posto_id);
    	}

       	return $data->orderBy('data', 'desc')->orderBy('hora', 'desc')->get();
    }

    public function viaturas(Request $request){    
    	$data = Viatura::find($request->veiculo_id)->eventos()->where('data','>=', $request->data_ini)->where('data','<=', $request->data_fim);

 
       	return $data->orderBy('data', 'desc')->get();
    }
}
