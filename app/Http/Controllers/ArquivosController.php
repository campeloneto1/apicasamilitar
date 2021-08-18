<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\Arquivo;
use App\Models\Log;
use Illuminate\Support\Facades\Storage;

class ArquivosController extends Controller
{
    public function postArquivo(Request $request){  
        if ($request->hasFile('image')){
            $file      = $request->file('image');
            $filename  = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture   = $request->id.date('dmYHis')."a.".$extension;
            //move image to public/img folder
            $file->move(public_path('arquivos'), $picture);      
            //Storage::disk('local')->put($picture, 'Contents');
            return $picture;      
        }else{
            return 2;
        }
  
        
    }

    public function postPessoas(Request $request){  
        $data = new Arquivo;

        $data->tipo_id = $request->tipo_id;
        $data->nome = $request->nomearq;
        $data->pessoa_id = $request->pessoa_id; 
        $data->data = $request->data; 
        $data->hora = $request->hora; 

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um arquivo na pessoa';
            $log->table = 'arquivos';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          return 1;
        }else{
          return 2;
        }
  
        
    }

    public function postManifestacoes(Request $request){  
        $data = new Arquivo;

        $data->tipo_id = $request->tipo_id;
        $data->nome = $request->nomearq;
        $data->manifestacao_id = $request->manifestacao_id; 
        $data->data = $request->data; 
        $data->hora = $request->hora; 

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um arquivo na manifestação';
            $log->table = 'arquivos';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          return 1;
        }else{
          return 2;
        }
  
        
    }

    public function postVeiculos(Request $request){  
        $data = new Arquivo;

        $data->tipo_id = $request->tipo_id;
        $data->nome = $request->nomearq;
        $data->veiculo_id = $request->veiculo_id; 
        $data->data = $request->data; 
        $data->hora = $request->hora; 

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um arquivo no veículo';
            $log->table = 'arquivos';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          return 1;
        }else{
          return 2;
        }
  
        
    }

    public function postSindicatos(Request $request){  
        $data = new Arquivo;

        $data->tipo_id = $request->tipo_id;
        $data->nome = $request->nomearq;
        $data->sindicato_id = $request->sindicato_id; 
        $data->data = $request->data; 
        $data->hora = $request->hora; 

        $data->created_by = Auth::id();        

        if($data->save()){
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Cadastrou um arquivo no sindicato';
            $log->table = 'arquivos';
            $log->action = 1;
            $log->fk = $data->id;
            $log->object = $data;
            $log->save();
          return 1;
        }else{
          return 2;
        }
  
        
    }

    public function delete(Request $request){    
        $data = Arquivo::find($request->id);
         
         if($data->delete()){
            unlink('arquivos/'.$data->nome);
            $log = new Log;
            $log->user_id = Auth::id();
            $log->mensagem = 'Excluiu um arquivo';
            $log->table = 'arquivos';
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
