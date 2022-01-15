<?php

namespace App\Http\Controllers;

use App\Models\Mensagem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
{
    protected $mensagens;

    public function __construct(Mensagem $mensagem)
    {
        $this->mensagens = $mensagem;

    }

    public function teste()
    {

        return $this->mensagens->all();
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'destinatario_id' => 'required',
            'mensagem' => 'required',
        ]);

        if(is_null(User::find($request->destinatario_id))){
            return response()->json('Destinatario não encontrado', 404);
        }

        if(Auth::user()->id === $request->destinatario_id){
            
            return response()->json('Algo de errado: você tentou mandar uma mensagem para si mesmo', 200);
        }

        Mensagem::create([
            'mensagem' => filter_var($request->mensagem, FILTER_SANITIZE_STRING),
            'remetente_id' => Auth::user()->id,
            'destinatario_id' => filter_var($request->destinatario_id, FILTER_SANITIZE_NUMBER_INT),
            'lido' => false
        ]);

        return response()->json('Mensagem enviada com sucesso!', 201);

    }

    public function destroy($id)
    {
        $mensagem = $this->mensagens->where(
            [
            'id' => $id,
             'destinatario_id' => Auth::user()->id
             ])->get()->first();

        if(is_null($mensagem)){
           return response()->json('Não encontrei a mensagem. Por favor verifique e tente novamente.', 404);
        }

        $mensagem->delete();

        return response()->json('Mensagem excluída com sucesso', 404);

    }

    public function update($id)
    {
        $mensagem = $this->mensagens->where(
            [
            'id' => $id,
             'destinatario_id' => Auth::user()->id
             ])->get()->first();

        if(is_null($mensagem)){
           return response()->json('Não encontrei a mensagem. Por favor verifique e tente novamente.', 404);
        }

        $mensagem->lido = true;
        
        $mensagem->save();

        return response()->json($mensagem, 201);
       
    }

    public function verMensagem($id)
    {
        $mensagem = $this->mensagens->where(
            [
            'id' => $id,
             'destinatario_id' => Auth::user()->id
             ])->get()->first();

        if(is_null($mensagem)){
           return response()->json('Não encontrei a mensagem. Por favor verifique e tente novamente.', 404);
        }

        return response()->json($mensagem, 201);
    }

    public function mensagensRecebidas()
    {
        $mensagens = $this->mensagens->where('destinatario_id', Auth::user()->id)->get();

        if(is_null($mensagens)){
            return response()->json('Não existe mensagens', 204);
        }
        
        return $mensagens;
    }

    public function mensagensEnviadas()
    {
        $mensagens = $this->mensagens->where('remetente_id', Auth::user()->id)->get();

        if(is_null($mensagens)){
            return response()->json(['mensagem'=> 'Não existe mensagens'],204);
        }
        
        return $mensagens;
    }
}