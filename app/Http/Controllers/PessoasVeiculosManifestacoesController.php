<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\PessoaVeiculoManifestacao;
use App\Models\Veiculo;
use App\Models\Pessoa;
use App\Models\Manifestacao;
use App\Models\Log;


class PessoasVeiculosManifestacoesController extends Controller
{
     public function postPessoasVeiculos(Request $request){  
        $erro = false ; 
        for ($i=0; $i < count($request->veiculo_id); $i++) { 
        	$vei = Veiculo::find($request->veiculo_id[$i]);
          $data = new PessoaVeiculoManifestacao;

          $data->pessoa_id = $request->pessoa_id;
          $data->veiculo_id = $request->veiculo_id[$i];

          $data->created_by = Auth::id();  

          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um veiculo na pessoa';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          }else{
            $erro = true;
          }
        }
              

        if($erro){
          return 2;
        }else{
          return 1;
        }
    }

    public function deletePessoasVeiculos(Request $request){    
       	$data = PessoaVeiculoManifestacao::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um veiculo de uma pessoa';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }

    public function postPessoasManifestacoes(Request $request){  
          $data = new PessoaVeiculoManifestacao;

          $data->pessoa_id = $request->pessoa_id;
          $data->manifestacao_id = $request->manifestacao_id;
          $data->lider = $request->lider;
          $data->veiculo_id = $request->veiculo_id;

          $data->created_by = Auth::id();  
          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma pessoa na manifestacao'; 
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }

    }

    public function deletePessoasManifestacoes(Request $request){    
        $data = PessoaVeiculoManifestacao::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu  uma pessoa de uma manifestação';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }

    public function postManifestacoesVeiculos(Request $request){  
         $erro = false ; 
        for ($i=0; $i < count($request->veiculo_id); $i++) { 
          $data = new PessoaVeiculoManifestacao;

          $data->manifestacao_id = $request->manifestacao_id;
          $data->veiculo_id = $request->veiculo_id[$i];

          $data->created_by = Auth::id();  
          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um veiculo na manifestacao';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          }else{
            $erro = true;
          }
        }
          
        if($erro){
          return 2;
        }else{
          return 1;
        }
    }

    public function deleteManifestacoesVeiculos(Request $request){    
        $data = PessoaVeiculoManifestacao::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um veiculo da manifestação';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }

    public function postSindicatosPessoas(Request $request){  
          $data = new PessoaVeiculoManifestacao;

          $data->sindicato_id = $request->sindicato_id;
          $data->pessoa_id = $request->pessoa_id;
          $data->lider = $request->lider;

          $data->created_by = Auth::id();  
          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou uma pessoa no sindicato';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
        
    }

    public function deleteSindicatosPessoas(Request $request){    
        $data = PessoaVeiculoManifestacao::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu uma pessoa do sindicato';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 3;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
            return 1;
          }else{
            return 2;
          }
    }


    public function postSindicatosVeiculos(Request $request){  
         $erro = false ; 
        for ($i=0; $i < count($request->veiculo_id); $i++) { 
          $data = new PessoaVeiculoManifestacao;

          $data->sindicato_id = $request->sindicato_id;
          $data->veiculo_id = $request->veiculo_id[$i];

          $data->created_by = Auth::id();  
          
          if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um veiculo no sindicato';
            $log->table = 'pessoas_veiculos_manifestacoes';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          }else{
            $erro = true;
          }
        }
          
        if($erro){
          return 2;
        }else{
          return 1;
        }
    }

    public function deleteSindicatosVeiculos(Request $request){    
        $data = PessoaVeiculoManifestacao::find($request->id);
         
         if($data->delete()){
          $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um veiculo do sindicato';
            $log->table = 'pessoas_veiculos_manifestacoes';
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
