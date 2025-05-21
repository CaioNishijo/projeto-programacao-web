<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $dados = $request->all();
            $dados['password'] = Hash::make($dados['password']);
            User::create($dados);
            return redirect('/login');
        }catch(Exception $e){
            Log::erorr("Erro ao criar usuário: ".$e->getMessage(), [
                'stack'=>$e->getTraceAsString(),
                'request'=>$request->all()
            ]);
            return redirect('/cadastro')->with('erro', 'Erro ao cadastrar');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $user = Auth::user();
            if (!Hash::check($request->input('confirm-password'), $user->password)){
                return redirect('/editar')
                    ->with('erro', 'A senha anterior não confere!');
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            Auth::logout();
            return redirect('/login');
        } catch(Exception $e){
            Log::error("Erro ao aditar o usuário:" . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect('/editar')->with('erro', 'Erro ao editar!');
        } 
    }
}
