<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use App\Models\Acesso;
use App\Models\Evento;

class HomeController extends Controller
{
    public function ultimosacessos(){    
    	 $user = Auth::user();
        if($user->perfil->administrador){
            return Acesso::orderBy('id', 'desc')->limit(6)->get();
        }else{
            return Acesso::where('orgao_id', $user->orgao_id)->orderBy('id', 'desc')->limit(6)->get();
        }
    }

    public function proximoseventos(){    
    	$date = Carbon::now();

    	$user = Auth::user();
        if($user->perfil->administrador){
            return Evento::where('data', '>=', $date->year.'-'.$date->month.'-'.$date->day)->orderBy('data')->orderBy('hora')->limit(6)->get();
        }else{
            return Evento::where('orgao_id', $user->orgao_id)->where('data', '>=', $date->year.'-'.$date->month.'-'.$date->day)->orderBy('data')->orderBy('hora')->limit(6)->get();
        }
       	
    }
}
