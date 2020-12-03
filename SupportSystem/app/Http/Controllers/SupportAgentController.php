<?php

namespace App\Http\Controllers;

use Auth;
use App\SupportAgent;
use App\SupportTicket;
use App\TicketsByAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupportAgentController extends Controller {

    protected $supportTicketModel, $supportAgentModel, $ticketsByAgentModel;
    public function __construct(SupportTicket $supportTicketModel, SupportAgent $supportAgentModel, TicketsByAgent $ticketsByAgentModel) {
        $this->supportTicketModel = $supportTicketModel;
        $this->supportAgentModel = $supportAgentModel;
        $this->ticketsByAgentModel = $ticketsByAgentModel;
    }

    public function supportAgentLogin(Request $request) {
        if(Auth::check()){
            return response()->json([
                'message' => 'Already logged in'
            ]);
        } else {
            $validation = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);

            if($validation->fails()){
                return redirect()->back()->withInput()->withErrors($validation);
            } else {
                $credentials = ['email'=> $request['email'], 'password' => $request['password']];
                if(Auth::guard('web')->attempt($credentials)){
                    return redirect()->route('suppAgentIndex')->with('success', 'Successfuly logged In..');
                } else {
                    return redirect()->route('home')->with('warning', 'Login Failed..');
                }
            }
        }
    }

    public function getSupportTickets() {
        $supportTickets = [];
        // $supportTicket  => one ticket from ticket collection
        foreach ($this->supportTicketModel->all() as $key => $supportTicket) {
            // $comment_by_agent  => comment by agent loggedIn;
            foreach ($supportTicket->commentsOnTicketsByAgent as $key => $comment_by_agent) {
                // pivot gives details on comment
                $supportTickets[] = array(
                    "ticket" => $supportTicket,
                    "agent" => $comment_by_agent,
                    "comment_details" => $comment_by_agent->pivot
                );
            }
        }
        $data["supportTickets"] = $supportTickets;
        return view('SupportAgent.tickets.index', $data);
    }    
}
