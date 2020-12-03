<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\SupportAgent;
use App\SupportTicket;
use App\TicketsByAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentTicketController extends Controller
{
    protected $supportTicketModel, $supportAgentModel, $ticketsByAgentModel;
    public function __construct(SupportTicket $supportTicketModel, SupportAgent $supportAgentModel, TicketsByAgent $ticketsByAgentModel) {
        $this->supportTicketModel = $supportTicketModel;
        $this->supportAgentModel = $supportAgentModel;
        $this->ticketsByAgentModel = $ticketsByAgentModel;
    }
    public function viewCommentTicket(int $ticketId) {
        $data["ticket"] = $this->supportTicketModel->find($ticketId);
        $data["agentComment"] = $this->ticketsByAgentModel->where(["agent_id" => Auth::user()->id, "ticket_id" => $ticketId])->get();
        return view('SupportAgent.tickets.comment', $data);
    }

    public function commentTicket(int $ticketId, Request $request) {
        $validation = Validator::make($request->all(), [
            'comment' => 'required'
        ]);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);    
        } else {
            $ticket = $this->supportTicketModel->find($ticketId);
            $agentComment = $this->ticketsByAgentModel->where(["agent_id" => Auth::user()->id, "ticket_id" => $ticketId])->get();
            if(isset($agentComment)){
                $agentComment[0]->update([
                    "is_viewed" => 1,
                    "comment" => $request->comment,
                    "commented_date_time" => Carbon::now(),
                ]);
                return redirect()->route('suppAgentIndex')->with('success', 'Comment added Successfully..');
            }
            return redirect()->route('suppAgentIndex')->with('warning', 'Adding comment failed..');
        }
    }
}
