<?php
use Illuminate\Support\Facades\Auth;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api', 'middleware' => 'auth'], function () use ($router){
    $router->post('/mensagem', 'MensagemController@store');
    $router->get('/mensagem', 'MensagemController@mensagensRecebidas');
    $router->get('/mensagens-enviadas', 'MensagemController@mensagensEnviadas');
    $router->get('/mensagem/{id}', 'MensagemController@verMensagem');
    $router->put('/mensagem/{id}', 'MensagemController@update');
    $router->delete('/mensagem/{id}', 'MensagemController@destroy');
    $router->get('/dashboard', 'UsuariosController@dashboard');
});

$router->get('/api/healthcheck', 'DashboardController@healthcheck');
$router->post('/api/login', 'LoginController@login');   



