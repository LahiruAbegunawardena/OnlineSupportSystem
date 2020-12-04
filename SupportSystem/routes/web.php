<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/add-support-ticket', 'TicketController@openTicket')->name('addTicket');
Route::post('/store-support-ticket', 'TicketController@storeTicket')->name('storeTicket');
Route::get('/find-support-ticket', 'TicketController@findTicketDet')->name('findTicketDet');
Route::post('/get-support-ticket', 'TicketController@getTicketDet')->name('getTicketDet');

Route::post('/support-agent-login', 'SupportAgentController@supportAgentLogin')->name('suppAgentLogin');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth:web')->group(function () {
Route::get('/support-tickets', 'SupportAgentController@getSupportTickets')->name('suppAgentIndex');
Route::get('/support-tickets/{ticket_id}/comment', 'AgentTicketController@viewCommentTicket');
Route::post('/support-tickets/{ticket_id}/comment-on-ticket', 'AgentTicketController@commentTicket')->name('commentTicket');

});