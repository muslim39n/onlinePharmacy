<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Customer;

class MainController extends Controller
{
    public function index(Request $request){
      $user = "-";
      $role = 'customer';

        if($request->session()->has('user_id')){
          $user_id = $request->session()->get('user_id');

          if($request->session()->has('role')){
            $role = $request->session()->get('role');
          }

          if($role=='customer'){
            $user = Customer::find($user_id);
          }
        }

        if($user != '-'){
          $user->push('basket', 'wert', true);
          $user->save();
        }

        $medicines = Medicine::get();
        return view('index', compact(['medicines', 'user', 'role']));
    }


    public function search(Request $request){
      $user = "-";
      $role = 'customer';

      if($request->session()->has('user_id')){
        $user_id = $request->session()->get('user_id');

        if($request->session()->has('role')){
          $role = $request->session()->get('role');
        }

        if($role=='customer'){
          $user = Customer::find($user_id);
        }
      }

      if(!empty($request->input('word')) && !empty($request->input('pricefrom'))){
        $medicines = Medicine::where(function($query){
          $query->where('name', 'like', '%'.$request->input('word').'%')
                        ->orWhere('description', 'like', '%'.$request->input('word').'%');
        })
        ->where(['price', '>=', (int)$request->input('pricefrom')],
                ['price', '<=', (int)$request->input('priceto')])->get();



        return view('index', compact(['medicines', 'user']));
      }
      else if(!empty($request->input('word'))){
        $medicines = Medicine::where('name', 'like', '%'.$request->input('word').'%')
                      ->orWhere('description', 'like', '%'.$request->input('word').'%')->get();

        return view('index', compact(['medicines', 'user']));
      }
      else if(!empty($request->input('pricefrom'))){
        $medicines = Medicine::where([['price', '>=', (int)$request->input('pricefrom')],
                ['price', '<=', (int)$request->input('priceto')]])->get();

        return view('index', compact(['medicines', 'user']));
      }

      return redirect()->route('index');
    }
}
