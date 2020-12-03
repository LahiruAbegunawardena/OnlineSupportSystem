<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\SupportAgent;
use App\SupportTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller {
    protected $supportTicketModel, $supportAgentModel;
    public function __construct(SupportTicket $supportTicketModel, SupportAgent $supportAgentModel) {
        $this->supportTicketModel = $supportTicketModel;
        $this->supportAgentModel = $supportAgentModel;
    }
    public function openTicket() {
        return view('add-ticket');
    }

    public function storeTicket(Request $request) {
        $validation = Validator::make($request->all(), [
            'customer_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact_number' => 'required|max:10|min:10|',
            'problem_description' => 'required',
        ]);
        if($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation);    
        } else {
            $uniqueid_1 = "#".uniqid();
            $data = $request->all();
            $data["is_fixed"] = 0;
            $data["ticket_ref_no"] = $uniqueid_1."_".uniqid();
            $newSuppTicket = $this->supportTicketModel->create($data);
            if(isset($newSuppTicket)) {
                foreach ($this->supportAgentModel->all() as $key => $supportAgent) {
                    $newSuppTicket->commentsOnTicket()->attach($supportAgent->id);
                }
                return redirect()->back()->with('success', 'Support Ticket generated Successfully..');
            } else {
                return redirect()->back()->with('warning', 'Support Ticket generation failed..');
            }
        }
    }
}
