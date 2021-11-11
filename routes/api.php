<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\UsuariosVeiculosController;
use App\Http\Controllers\OrgaosController;
use App\Http\Controllers\SetoresController;
use App\Http\Controllers\FuncoesController;
use App\Http\Controllers\PostosController;
use App\Http\Controllers\PerfisController;
use App\Http\Controllers\AcessosController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\EventosTiposController;
use App\Http\Controllers\EventosUsuariosController;
use App\Http\Controllers\EventosViaturasController;
use App\Http\Controllers\PostoGradController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\CidadesController;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NiveisController;
use App\Http\Controllers\NiveisPostosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ModelosController;
use App\Http\Controllers\VeiculosTiposController;
use App\Http\Controllers\VeiculosController;
use App\Http\Controllers\ViaturasController;
use App\Http\Controllers\PessoasController;
use App\Http\Controllers\PessoasVeiculosManifestacoesController;
use App\Http\Controllers\ManifestacoesController;
use App\Http\Controllers\ManifestacoesTiposController;
use App\Http\Controllers\PessoasRedesSociaisController;
use App\Http\Controllers\InfluenciasController;
use App\Http\Controllers\CoresController;
use App\Http\Controllers\ArquivosController;
use App\Http\Controllers\SindicatosController;
use App\Http\Controllers\RedesSociaisController;
use App\Http\Controllers\RelatoriosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
	
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']); 


     Route::group(['middleware' => ['jwt.verify']], function() {
        
        Route::get('/check', [AuthController::class, 'check']);    
        Route::get('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']); 

        Route::get('/home-ultimos-acessos', [HomeController::class, 'ultimosacessos']); 
        Route::get('/home-proximos-eventos', [HomeController::class, 'proximoseventos']); 

        Route::get('/logs', [LogsController::class, 'index']); 
        Route::get('/logs/{id}', [LogsController::class, 'find']); 
        Route::post('/logs', [LogsController::class, 'post']); 
        Route::put('/logs', [LogsController::class, 'put']);   
        Route::delete('/logs/{id}', [LogsController::class, 'delete']); 

        Route::get('/usuarios', [UsuariosController::class, 'index']); 
        Route::get('/usuarios2', [UsuariosController::class, 'index2']); 
	    Route::get('/usuarios/{id}', [UsuariosController::class, 'find']); 
	    Route::post('/usuarios', [UsuariosController::class, 'post']); 
	    Route::put('/usuarios', [UsuariosController::class, 'put']);   
	    Route::delete('/usuarios/{id}', [UsuariosController::class, 'delete']); 
        Route::post('/usuarios/digital', [UsuariosController::class, 'digital']); 
        Route::get('/usuarios/{id}/acesso/ativar', [UsuariosController::class, 'acesso_ativar']); 
        Route::get('/usuarios/{id}/acesso/desativar', [UsuariosController::class, 'acesso_desativar']); 
        Route::get('/usuarios-acesso', [UsuariosController::class, 'where']); 
        Route::get('/usuarios-eventos/{id}', [UsuariosController::class, 'proxeventos']); 
        Route::post('/usuarios-foto', [UsuariosController::class, 'foto']); 
        Route::post('/usuarios-digital', [UsuariosController::class, 'digital']); 
        Route::get('/usuarios-resetpass/{id}', [UsuariosController::class, 'reset_password']); 
        Route::post('/usuarios-changepass', [UsuariosController::class, 'change_password']); 

        Route::get('/usuarios-veiculos', [UsuariosVeiculosController::class, 'index']); 
        Route::get('/usuarios-veiculos/{id}', [UsuariosVeiculosController::class, 'where']); 
        Route::post('/usuarios-veiculos', [UsuariosVeiculosController::class, 'post']); 
        Route::put('/usuarios-veiculos', [UsuariosVeiculosController::class, 'put']);   
        Route::delete('/usuarios-veiculos/{id}', [UsuariosVeiculosController::class, 'delete']); 

        Route::get('/orgaos', [OrgaosController::class, 'index']); 
        Route::get('/orgaos2', [OrgaosController::class, 'index2']); 
        Route::get('/orgaos/{id}', [OrgaosController::class, 'find']); 
        Route::post('/orgaos', [OrgaosController::class, 'post']); 
        Route::put('/orgaos', [OrgaosController::class, 'put']);   
        Route::delete('/orgaos/{id}', [OrgaosController::class, 'delete']);

        Route::get('/setores', [SetoresController::class, 'index']); 
        Route::get('/setores2', [SetoresController::class, 'index2']); 
        Route::get('/setores/where/{id}', [SetoresController::class, 'where']); 
        Route::get('/setores/{id}', [SetoresController::class, 'find']); 
        Route::post('/setores', [SetoresController::class, 'post']); 
        Route::put('/setores', [SetoresController::class, 'put']);   
        Route::delete('/setores/{id}', [SetoresController::class, 'delete']); 

        Route::get('/funcoes', [FuncoesController::class, 'index']); 
        Route::get('/funcoes/{id}', [FuncoesController::class, 'find']); 
        Route::post('/funcoes', [FuncoesController::class, 'post']); 
        Route::put('/funcoes', [FuncoesController::class, 'put']);   
        Route::delete('/funcoes/{id}', [FuncoesController::class, 'delete']); 

        Route::get('/postos', [PostosController::class, 'index']); 
        Route::get('/postos2', [PostosController::class, 'index2']); 
        Route::get('/postos/{id}', [PostosController::class, 'find']); 
        Route::post('/postos', [PostosController::class, 'post']); 
        Route::put('/postos', [PostosController::class, 'put']);   
        Route::delete('/postos/{id}', [PostosController::class, 'delete']);
        Route::get('/postos-acesso', [PostosController::class, 'acesso']);
        Route::get('/postos/{id}/where', [PostosController::class, 'where']);

        Route::get('/perfis', [PerfisController::class, 'index']); 
        Route::get('/perfis/{id}', [PerfisController::class, 'find']); 
        Route::post('/perfis', [PerfisController::class, 'post']); 
        Route::put('/perfis', [PerfisController::class, 'put']);   
        Route::delete('/perfis/{id}', [PerfisController::class, 'delete']);

        Route::get('/eventos', [EventosController::class, 'index']); 
        Route::get('/eventos2', [EventosController::class, 'index2']); 
        Route::get('/eventos/{id}', [EventosController::class, 'find']); 
        Route::post('/eventos', [EventosController::class, 'post']); 
        Route::put('/eventos', [EventosController::class, 'put']);   
        Route::delete('/eventos/{id}', [EventosController::class, 'delete']);

        Route::get('/eventos-tipos', [EventosTiposController::class, 'index']); 
        Route::get('/eventos-tipos/{id}', [EventosTiposController::class, 'find']); 
        Route::post('/eventos-tipos', [EventosTiposController::class, 'post']); 
        Route::put('/eventos-tipos', [EventosTiposController::class, 'put']);   
        Route::delete('/eventos-tipos/{id}', [EventosTiposController::class, 'delete']);

        Route::get('/eventos-usuarios', [EventosUsuariosController::class, 'index']); 
        Route::get('/eventos-usuarios/{id}', [EventosUsuariosController::class, 'find']); 
        Route::post('/eventos-usuarios', [EventosUsuariosController::class, 'post']); 
        Route::put('/eventos-usuarios', [EventosUsuariosController::class, 'put']);   
        Route::delete('/eventos-usuarios/{id}', [EventosUsuariosController::class, 'delete']);

        Route::get('/eventos-viaturas', [EventosViaturasController::class, 'index']); 
        Route::get('/eventos-viaturas/{id}', [EventosViaturasController::class, 'find']); 
        Route::post('/eventos-viaturas', [EventosViaturasController::class, 'post']); 
        Route::put('/eventos-viaturas', [EventosViaturasController::class, 'put']);   
        Route::delete('/eventos-viaturas/{id}', [EventosViaturasController::class, 'delete']);
 
        Route::get('/postograd', [PostoGradController::class, 'index']); 
        Route::get('/postograd/{id}', [PostoGradController::class, 'find']); 
        Route::post('/postograd', [PostoGradController::class, 'post']); 
        Route::put('/postograd', [PostoGradController::class, 'put']);   
        Route::delete('/postograd/{id}', [PostoGradController::class, 'delete']);

        Route::get('/estados', [EstadosController::class, 'index']); 
        Route::get('/estados/{id}', [EstadosController::class, 'find']); 
        Route::post('/estados', [EstadosController::class, 'post']); 
        Route::put('/estados', [EstadosController::class, 'put']);   
        Route::delete('/estados/{id}', [EstadosController::class, 'delete']);

        Route::get('/cidades', [CidadesController::class, 'index']); 
        Route::get('/cidades/{id}', [CidadesController::class, 'find']); 
        Route::post('/cidades', [CidadesController::class, 'post']); 
        Route::put('/cidades', [CidadesController::class, 'put']);   
        Route::delete('/cidades/{id}', [CidadesController::class, 'delete']);
        Route::get('/cidades/{id}/where', [CidadesController::class, 'where']);

        Route::get('/acessos', [AcessosController::class, 'index']); 
        Route::get('/acessos2', [AcessosController::class, 'index2']); 
        Route::get('/acessos/{id}', [AcessosController::class, 'find']); 
        Route::post('/acessos', [AcessosController::class, 'post']); 
        Route::put('/acessos', [AcessosController::class, 'put']);   
        Route::delete('/acessos/{id}', [AcessosController::class, 'delete']);
        Route::post('/acessos/registro', [AcessosController::class, 'registro']); 

        Route::get('/locais', [LocaisController::class, 'index']); 
        Route::get('/locais/{id}', [LocaisController::class, 'find']); 
        Route::post('/locais', [LocaisController::class, 'post']); 
        Route::put('/locais', [LocaisController::class, 'put']);   
        Route::delete('/locais/{id}', [LocaisController::class, 'delete']);

        Route::get('/niveis', [NiveisController::class, 'index']); 
        Route::get('/niveis/{id}', [NiveisController::class, 'find']); 
        Route::post('/niveis', [NiveisController::class, 'post']); 
        Route::put('/niveis', [NiveisController::class, 'put']);   
        Route::delete('/niveis/{id}', [NiveisController::class, 'delete']);

        Route::get('/niveis-postos', [NiveisPostosController::class, 'index']); 
        Route::get('/niveis-postos/{id}', [NiveisPostosController::class, 'find']); 
        Route::post('/niveis-postos', [NiveisPostosController::class, 'post']); 
        Route::put('/niveis-postos', [NiveisPostosController::class, 'put']);   
        Route::delete('/niveis-postos/{id}', [NiveisPostosController::class, 'delete']);

        Route::get('/marcas', [MarcasController::class, 'index']); 
        Route::get('/marcas/{id}', [MarcasController::class, 'find']); 
        Route::post('/marcas', [MarcasController::class, 'post']); 
        Route::put('/marcas', [MarcasController::class, 'put']);   
        Route::delete('/marcas/{id}', [MarcasController::class, 'delete']);

        Route::get('/modelos', [ModelosController::class, 'index']); 
        Route::get('/modelos/{id}', [ModelosController::class, 'find']); 
        Route::post('/modelos', [ModelosController::class, 'post']); 
        Route::put('/modelos', [ModelosController::class, 'put']);   
        Route::delete('/modelos/{id}', [ModelosController::class, 'delete']);
        Route::get('/modelos/{id}/where', [ModelosController::class, 'where']); 

        Route::get('/viaturas', [ViaturasController::class, 'index']); 
        Route::get('/viaturas2', [ViaturasController::class, 'index2']); 
        Route::get('/viaturas/{id}', [ViaturasController::class, 'find']); 
        Route::post('/viaturas', [ViaturasController::class, 'post']); 
        Route::put('/viaturas', [ViaturasController::class, 'put']);   
        Route::delete('/viaturas/{id}', [ViaturasController::class, 'delete']);  
        Route::get('/viaturas/{id}/where', [ViaturasController::class, 'where']);  

        Route::get('/veiculos', [VeiculosController::class, 'index']); 
        Route::get('/veiculos/{id}', [VeiculosController::class, 'find']); 
        Route::post('/veiculos', [VeiculosController::class, 'post']); 
        Route::put('/veiculos', [VeiculosController::class, 'put']);   
        Route::delete('/veiculos/{id}', [VeiculosController::class, 'delete']);
        Route::get('/veiculos/{id}/where', [VeiculosController::class, 'where']);  

        Route::get('/veiculos-tipos', [VeiculosTiposController::class, 'index']); 
        Route::get('/veiculos-tipos/{id}', [VeiculosTiposController::class, 'find']); 
        Route::post('/veiculos-tipos', [VeiculosTiposController::class, 'post']); 
        Route::put('/veiculos-tipos', [VeiculosTiposController::class, 'put']);   
        Route::delete('/veiculos-tipos/{id}', [VeiculosTiposController::class, 'delete']);

        Route::post('/relatorios-acessos', [RelatoriosController::class, 'acessos']); 
        Route::post('/relatorios-viaturas', [RelatoriosController::class, 'viaturas']); 

        Route::get('/pessoas', [PessoasController::class, 'index']); 
        Route::get('/pessoas/{id}', [PessoasController::class, 'find']); 
        Route::post('/pessoas', [PessoasController::class, 'post']); 
        Route::put('/pessoas', [PessoasController::class, 'put']);   
        Route::delete('/pessoas/{id}', [PessoasController::class, 'delete']); 
        Route::post('/pessoas-foto', [PessoasController::class, 'foto']); 
        Route::get('/pessoas/{id}/where', [PessoasController::class, 'where']);
        Route::get('/pessoas/{id}/where2', [PessoasController::class, 'where2']);

        Route::post('/pessoas-redes', [PessoasRedesSociaisController::class, 'post']);
        Route::delete('/pessoas-redes/{id}', [PessoasRedesSociaisController::class, 'delete']);         
        Route::post('/pessoas-veiculos', [PessoasVeiculosManifestacoesController::class, 'postPessoasVeiculos']);         
        Route::delete('/pessoas-veiculos/{id}', [PessoasVeiculosManifestacoesController::class, 'deletePessoasVeiculos']); 
        Route::post('/pessoas-manifestacoes', [PessoasVeiculosManifestacoesController::class, 'postPessoasManifestacoes']); 
        Route::delete('/pessoas-manifestacoes/{id}', [PessoasVeiculosManifestacoesController::class, 'deletePessoasManifestacoes']); 
        Route::post('/manifestacoes-veiculos', [PessoasVeiculosManifestacoesController::class, 'postManifestacoesVeiculos']); 
        Route::delete('/manifestacoes-veiculos/{id}', [PessoasVeiculosManifestacoesController::class, 'deleteManifestacoesVeiculos']);

        Route::post('/sindicatos-veiculos', [PessoasVeiculosManifestacoesController::class, 'postSindicatosVeiculos']); 
        Route::delete('/sindicatos-veiculos/{id}', [PessoasVeiculosManifestacoesController::class, 'deleteSindicatosVeiculos']);

        Route::post('/sindicatos-pessoas', [PessoasVeiculosManifestacoesController::class, 'postSindicatosPessoas']); 
        Route::delete('/sindicatos-pessoas/{id}', [PessoasVeiculosManifestacoesController::class, 'deleteSindicatosPessoas']);

        Route::get('/manifestacoes', [ManifestacoesController::class, 'index']); 
        Route::get('/manifestacoes/{id}', [ManifestacoesController::class, 'find']); 
        Route::post('/manifestacoes', [ManifestacoesController::class, 'post']); 
        Route::put('/manifestacoes', [ManifestacoesController::class, 'put']);   
        Route::delete('/manifestacoes/{id}', [ManifestacoesController::class, 'delete']);
        Route::get('/manifestacoes/{id}/where', [ManifestacoesController::class, 'where']);

        Route::get('/manifestacoes-tipos', [ManifestacoesTiposController::class, 'index']); 
        Route::get('/manifestacoes-tipos/{id}', [ManifestacoesTiposController::class, 'find']); 
        Route::post('/manifestacoes-tipos', [ManifestacoesTiposController::class, 'post']); 
        Route::put('/manifestacoes-tipos', [ManifestacoesTiposController::class, 'put']);   
        Route::delete('/manifestacoes-tipos/{id}', [ManifestacoesTiposController::class, 'delete']);

        Route::get('/redes-sociais', [RedesSociaisController::class, 'index']); 
        Route::get('/redes-sociais/{id}', [RedesSociaisController::class, 'find']); 
        Route::post('/redes-sociais', [RedesSociaisController::class, 'post']); 
        Route::put('/redes-sociais', [RedesSociaisController::class, 'put']);   
        Route::delete('/redes-sociais/{id}', [RedesSociaisController::class, 'delete']);

        Route::get('/cores', [CoresController::class, 'index']); 
        Route::get('/cores/{id}', [CoresController::class, 'find']); 
        Route::post('/cores', [CoresController::class, 'post']); 
        Route::put('/cores', [CoresController::class, 'put']);   
        Route::delete('/cores/{id}', [CoresController::class, 'delete']);

        Route::get('/influencias', [InfluenciasController::class, 'index']); 
        Route::get('/influencias/{id}', [InfluenciasController::class, 'find']); 
        Route::post('/influencias', [InfluenciasController::class, 'post']); 
        Route::put('/influencias', [InfluenciasController::class, 'put']);   
        Route::delete('/influencias/{id}', [InfluenciasController::class, 'delete']);

        Route::get('/sindicatos', [SindicatosController::class, 'index']); 
        Route::get('/sindicatos/{id}', [SindicatosController::class, 'find']); 
        Route::post('/sindicatos', [SindicatosController::class, 'post']); 
        Route::put('/sindicatos', [SindicatosController::class, 'put']);   
        Route::delete('/sindicatos/{id}', [SindicatosController::class, 'delete']);
        Route::get('/sindicatos/{id}/where', [SindicatosController::class, 'where']);

        Route::post('/arquivos-arquivo', [ArquivosController::class, 'postArquivo']); 
        Route::post('/arquivos-pessoas', [ArquivosController::class, 'postPessoas']); 
        Route::post('/arquivos-veiculos', [ArquivosController::class, 'postVeiculos']); 
        Route::post('/arquivos-manifestacoes', [ArquivosController::class, 'postManifestacoes']); 
        Route::post('/arquivos-sindicatos', [ArquivosController::class, 'postSindicatos']); 
        Route::delete('/arquivos/{id}', [ArquivosController::class, 'delete']);

    });

});