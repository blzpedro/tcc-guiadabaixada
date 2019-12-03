<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('perfil');
    }

    public function update(Request $request){
        $messages = [
            'name.required' => 'Seu nome é obrigatório!',
            'email.required' =>'Seu e-mail é obrigatório!',
            'email.email' => 'Informe um e-mail válido.',
            'password.required' => 'Informe uma senha!'
        ];
        $validation = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|same:password',
        ], $messages);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()->first()]);
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['success' => 'Dados alterados com sucesso']);
    }
}
