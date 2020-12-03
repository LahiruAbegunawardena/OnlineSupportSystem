<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SupportAgent extends Authenticatable
{
    use Notifiable;

    protected $table = "support_agents";
    protected $primaryKey = "id";
    protected $fillable = [
        'agent_name', 'email', 'password', 'address', 'contact_number'
    ];

    protected $hidden = ["created_at", "updated_at"];

    public function commentsByAgent() {
        return $this->belongsToMany(SupportTicket::class, TicketsByAgent::class, 'agent_id', 'ticket_id')->withPivot('id', 'comment', 'is_viewed', 'commented_date_time');
    }
}
