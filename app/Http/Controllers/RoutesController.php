<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function createRoute(Request $request){
        $cretentials = $request->validate([
            'uri' => 'unique:routes',
            'link' => 'required',
            'user_id' => 'required'
        ]);
        if($cretentials)
        {
            $route = new Route();
            $route->uri = $cretentials['uri'];
            $route->link = $cretentials['link'];
            $route->user_id = $cretentials['user_id'];
            $route->save();
        }
        return response()->json([
            'error' => 'uri já utilizada, tente alterar ela!'
        ], 401);
    }
    public function getRoute($user)
    {
        $route = Route::all()->where('user_id', '=', $user);
        if(empty($route[0]))
        {
            return response()->json(["error" => "sem rotas"], 404);
        }
        return $route;
    }
    public function updateRoute(Request $request, $route)
    {
        $data = Route::find($route);
        $request->uri ? $data->uri = $request->uri: false;
        $request->link ? $data->link = $request->link : false;
        $data->save();
        return response()->json([
            "status" => "accept",
            "data" => $data
        ], 201);
    }
    public function deleteRoute($route)
    {
        if(empty($route[0]))
        {
            return response()->json(["error" => "sem rotas"], 404);
        }
        return $route;
    }
    public function redirectToRoute($uri)
    {
        $rota = Route::all()->where('uri', '=', $uri);
        return redirect('http://'.$rota[0]->link);
    }
    public function linkToRedirect($uri)
    {
        $rota = Route::all()->where('uri', '=', $uri);
        return response()->json([
            "status" => "success",
            "data" => $rota[0]->link
        ]);
    }
}