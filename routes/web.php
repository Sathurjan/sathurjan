<?php

use Illuminate\Support\Facades\Route;



Route::get('/tickets/index','TicketController@ticketIndex');
Route::get('/tickets/form','TicketController@ticketForm'); 
Route::post('/tickets/save','TicketController@saveTicket'); 
Route::get('/tickets/reply/{id}','TicketController@ticketReply');
Route::post('/tickets/saveReply/{id}','TicketController@saveTicketReply');
Route::post('/tickets/status','TicketController@ticketStatus'); 

Route::get('/agents/loginform','AgentController@loginForm');
Route::post('/agents/login','AgentController@login');
Route::get('/agents/registerform','AgentController@regiterForm'); 
Route::post('/agents/register','AgentController@register');
Route::get('/agents/logout','AgentController@logout');






Route::get('/', function () {
    return view('home');
});
