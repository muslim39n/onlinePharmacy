<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Customer;

class BasketController extends Controller
{
    public function addToBasket(Request $request){
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
          $user->push('basket', $request->input('id'), true);
          $user->save();
        }

        return redirect()->route('index');
    }

    public function basket(Request $request){
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

        if($user == '-'){
          return redirect()->route('index');
        }
        $sum = 0;
        $med_ids = $user->basket;
        $medicines = [];

        foreach ($med_ids as $id) {
          $med = Medicine::find($id);

          if(!empty($med)){
            $medicines[] = $med;
            $sum = $sum + $med->price;
          }
        }

        return view('basket', compact(['user', 'medicines', 'sum']));
    }
}
