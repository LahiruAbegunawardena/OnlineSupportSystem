<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model {
    protected $table = "support_tickets";
    protected $primaryKey = "id";

    protected $fillable = [
        'ticket_ref_no', 'customer_name', 'email', 'contact_number', 'problem_description', 'is_fixed'
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function commentsOnTicket() {
        return $this->belongsToMany(SupportAgent::class, TicketsByAgent::class, 'ticket_id', 'agent_id')->withPivot('id', 'comment', 'is_viewed', 'commented_date_time');
    }
    public function commentsOnTicketsByAgent() {
        // comments by Agent on a ticket
        return $this->belongsToMany(SupportAgent::class, TicketsByAgent::class, 'ticket_id', 'agent_id')->withPivot('id', 'comment', 'is_viewed', 'commented_date_time')->where(["agent_id" => Auth::user()->id]);
    }
}
