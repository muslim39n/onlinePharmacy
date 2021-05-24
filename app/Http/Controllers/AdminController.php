<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Customer;

class AdminController extends Controller
{

    public function newMedicine(Request $request){
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

          if($user != '-' && $user->role=='admin'){
            return view('addmed', compact(['user']));
          }

          return redirect()->route('index');
    }
    public function addMedicine(Request $request){
      $m = new Medicine();
      $m->name = $request->input('name');
      $m->description = $request->input('description');
      $m->price = (int)$request->input('price');
      $m->amount = (int)$request->input('amount');

      $m->save();

      return redirect()->route('index');
    }
}
