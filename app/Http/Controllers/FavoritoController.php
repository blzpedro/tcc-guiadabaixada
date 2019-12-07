<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Favorito; 
class FavoritoController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        if(Favorito::where(['user_id' => $user->id, 'local' => $request->local])->count() > 0){
            return response()->json(['success' => 'Já incluso.']);;
        }
        $store = Favorito::create([
            'user_id' => $user->id,
            'local' => addslashes($request->local)
        ]);
        return response()->json(['success' => 'Favoritado com sucesso']);

    }
}
