<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Perfil;
use App\Models\Log;

class PerfisController extends Controller
{
	public function index(){    
        $user = Auth::user();
        if($user->perfil->administrador){
            return Perfil::orderBy('nome')->get();
        }else{
            return Perfil::where('administrador', 0)->orderBy('nome')->get();
        }
       	
    }

    public function find(Request $request){    
       	return Perfil::find($request->id);
    }

    public function post(Request $request){    
        $data = new Perfil;

        $data->nome = $request->nome;

        if($request->administrador){
            $data->administrador = $request->administrador;
        }else{
            $data->administrador = 0;
        }
        if($request->gestor){
            $data->gestor = $request->gestor;
        }else{
            $data->gestor = 0;
        }

        if($request->acesso){
            $data->acesso = $request->acesso;
        }else{
            $data->acesso = 0;
        }
        if($request->c1){
            $data->c1 = $request->c1;
        }else{
            $data->c1 = 0;
        }
        if($request->relatorios){
            $data->relatorios = $request->relatorios;
        }else{
            $data->relatorios = 0;
        }
        if($request->estrategico){
            $data->estrategico = $request->estrategico;
        }else{
            $data->estrategico = 0;
        }

        if($request->users){
            $data->users = $request->users;
        }else{
            $data->users = 0;
        }
        if($request->users_cad){
            $data->users_cad = $request->users_cad;
        }else{
            $data->users_cad = 0;
        }
        if($request->users_edit){
            $data->users_edit = $request->users_edit;
        }else{
            $data->users_edit = 0;
        }
        if($request->users_del){
            $data->users_del = $request->users_del;
        }else{
            $data->users_del = 0;
        }
        if($request->users_dig){
            $data->users_dig = $request->users_dig;
        }else{
            $data->users_dig = 0;
        }
        if($request->users_ace){
            $data->users_ace = $request->users_ace;
        }else{
            $data->users_ace = 0;
        }
        if($request->users_foto){
            $data->users_foto = $request->users_foto;
        }else{
            $data->users_foto = 0;
        }

         if($request->eventos){
            $data->eventos = $request->eventos;
        }else{
            $data->eventos = 0;
        }
        if($request->eventos_cad){
            $data->eventos_cad = $request->eventos_cad;
        }else{
            $data->eventos_cad = 0;
        }
        if($request->eventos_edit){
            $data->eventos_edit = $request->eventos_edit;
        }else{
            $data->eventos_edit = 0;
        }
        if($request->eventos_del){
            $data->eventos_del = $request->eventos_del;
        }else{
            $data->eventos_del = 0;
        }
        if($request->eventos_usu){
            $data->eventos_usu = $request->eventos_usu;
        }else{
            $data->eventos_usu = 0;
        }
        if($request->eventos_vei){
            $data->eventos_vei = $request->eventos_vei;
        }else{
            $data->eventos_vei = 0;
        }

        if($request->viaturas){
            $data->viaturas = $request->viaturas;
        }else{
            $data->viaturas = 0;
        }
        if($request->viaturas_cad){
            $data->viaturas_cad = $request->viaturas_cad;
        }else{
            $data->viaturas_cad = 0;
        }
        if($request->viaturas_edit){
            $data->viaturas_edit = $request->viaturas_edit;
        }else{
            $data->viaturas_edit = 0;
        }
        if($request->viaturas_del){
            $data->viaturas_del = $request->viaturas_del;
        }else{
            $data->viaturas_del = 0;
        }

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um perfil';
            $log->table = 'perfis';
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
       	$data = Perfil::find($request->id);
        $dataold = Perfil::find($request->id);

        $data->nome = $request->nome;
        $data->administrador = $request->administrador;
        $data->gestor = $request->gestor;

        $data->acesso = $request->acesso;
        $data->c1 = $request->c1;
        $data->relatorios = $request->relatorios;
        $data->estrategico = $request->estrategico;

        $data->users = $request->users;
        $data->users_cad = $request->users_cad;
        $data->users_edit = $request->users_edit;
        $data->users_del = $request->users_del;
        $data->users_dig = $request->users_dig;
        $data->users_ace = $request->users_ace;
        $data->users_foto = $request->users_foto;

        $data->eventos = $request->eventos;
        $data->eventos_cad = $request->eventos_cad;
        $data->eventos_edit = $request->eventos_edit;
        $data->eventos_del = $request->eventos_del;
        $data->eventos_usu = $request->eventos_usu;
        $data->eventos_vei = $request->eventos_vei;

        $data->viaturas = $request->viaturas;
        $data->viaturas_cad = $request->viaturas_cad;
        $data->viaturas_edit = $request->viaturas_edit;
        $data->viaturas_del = $request->viaturas_del;


       	$data->updated_by = Auth::id();

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Editou um perfil';
            $log->table = 'perfis';
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
       	$data = Perfil::find($request->id);
         
         if($data->delete()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um perfil';
            $log->table = 'perfis';
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
