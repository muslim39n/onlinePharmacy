<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class UserController extends Controller
{
    public function registration(){
      return view('registration');
    }

    public function login(){
      return view('login');
    }

    public function register(Request $request){

      $customer = new Customer();
      $customer->firstname = $request->input('name');
      $customer->lastname = $request->input('lastname');
      $customer->address = $request->input('address');
      $customer->password = $request->input('password');
      $customer->phonenumber = $request->input('phonenumber');
      $customer->role = 'customer';
      $customer->save();

      return redirect()->route('index');
    }

    public function loginPost(Request $request){
      $customer = Customer::where('phonenumber', $request->input('phonenumber'))->first();

      if(is_null($customer)){
        dd('not found');
      }
      if($customer->password != $request->input('password')){
        dd('invalid password');
      }

      $request->session()->put('user_id', $customer->id);

      return redirect()->route('index');
    }

    public function logout(Request $request){
      $customer = $request->session()->pull('user_id');

      return redirect()->route('index');
    }
}
