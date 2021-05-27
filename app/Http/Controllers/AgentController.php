<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Agent;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;



class AgentController extends Controller
{

public function loginForm(){
	
	return view('agents.login');
}

public function login(Request $request){

		
        $email = $request->input('email');
        $pass = $request->input('password');
        
        $user = Agent::where('email',$email)
                ->where('password',$pass)
                ->select('agents.*')->first();


       if(!empty($user))
       {
         return redirect('tickets/index');
       }

       else{
       	 $request->Session()->flash("failed", "Incorrect Login");
                    return view('agents.login');
       }


}

public function regiterForm(Request $request){
	
	return view('agents.register');
}

public function register(Request $request){

     $validator = Validator::make($request->all(),[
            'name' =>'required',
            'password'=>'required',
            'email' => 'required|unique:agents,email',
            'confirm_password' => 'required',
            'confirm_password'=>'required_with:password|same:password'
           
            
        ]);
        
        if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

      $agent = new Agent();
      $agent->name = $request->input('name');
      $agent->email = $request->input('email');
      $agent->password = $request->input('password');
      $agent->confirm_password = $request->input('confirm_password');
      $agent->save();
      $request->Session()->flash("success", "Successfully Created");
  
  return redirect('tickets/index');
  
}

   public function logout(Request $request)
        {
        Session::forget('user');
        Session::flush();
          $request->Session()->flash("success", "You are logged out successfully");
        return redirect('/');
        }





}