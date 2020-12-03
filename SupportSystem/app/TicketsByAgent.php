<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketsByAgent extends Model {
    protected $table = "tickets_by_agents";
    protected $primaryKey = "id";

    protected $fillable = [
        'ticket_id', 'agent_id', 'is_viewed', 'comment', 'commented_date_time'
    ];

    protected $hidden = ["created_at", "updated_at"];
}
