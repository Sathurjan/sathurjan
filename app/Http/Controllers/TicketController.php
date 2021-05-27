<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Validator;
use App\Mail\myMail;
use App\Mail\replyMail;
use Illuminate\Support\Facades\Mail;



class TicketController extends Controller
{

public function ticketForm(){
	
	    return view('tickets.add');
}


public function saveTicket(Request $request){
    $validator = Validator::make($request->all(),[
        'name'     =>'required',
        'problem'  =>'required',
        'email'    => 'required',
        'phone_no' => 'required|numeric',    
        ]);
        
        if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $ticket = new Ticket();
        $ticket->name         = $request->input('name');
	    $ticket->problem      = $request->input('problem');
	    $ticket->email        = $request->input('email');
	    $ticket->phone_no     = $request->input('phone_no');
	    $ticket->status       = 0;
	    $ticket->reference_no ="REF-".rand(10,1000)."-". $request->input('name')."-".date('d');
      
        $ticket->save();
        // $ticket->refresh();

    $ref_no = $ticket->reference_no;
    $data   = array('ref_no' => $ref_no);
    $mail   = $request->input('email');

    Mail::to($mail)->send(new myMail($data));
     

    $request->Session()->flash("success", "send Ref no... check your mail");
	return redirect('/tickets/form');

}

public function ticketIndex(Request $request){
	 
    $name   = $request->input('search','');
    $ticket = Ticket::where('status',0)->select('tickets.*');

    if($name!=''){
        $ticket->where('name','LIKE',$name.'%');
    }

    $ticket->orderBy('tickets.id','desc');
    $results['customers'] = $ticket->paginate(3);

	return view('tickets.index',$results);
}


public function ticketReply($id,Request $request){
	
	$result['result'] = Ticket::find($id);  
	return view('tickets.reply',$result);
}

public function saveTicketReply($id,Request $request){
	
	$validator = Validator::make($request->all(),[
            'reply' =>'required',    
        ]);
	if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }
	Ticket::where('id',$id)->update(['reply' => $request->input('reply'), 'status' => 1]);

	$result = Ticket::find($id);
    $data = array('reply' => $result->reply);
    $mail = $result->email;
	Mail::to($mail)->send(new replyMail($data));

     $request->Session()->flash("success", "Successfully Updated");
	return redirect('/tickets/index');

}

public function ticketStatus(Request $request){

	$validator = Validator::make($request->all(),[
            'ref_no' =>'required',    
        ]);
        
    if($validator->fails()){
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
    }

	$ref_no = $request->input('ref_no');

	$ticket['data'] = Ticket::where('reference_no',$ref_no)->select('tickets.*')->first();
    if(!empty($ticket)){
        return view('tickets.ticket',$ticket);
    }

    else{
        $request->Session()->flash("failed", "Incorrect reference Number");
        return redirect('/');
    }

	
}

}