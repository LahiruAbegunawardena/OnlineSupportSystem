<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsByAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets_by_agents', function (Blueprint $table) {
            $table->id();
            $table->integer("ticket_id");
            $table->integer("agent_id");
            $table->tinyInteger("is_viewed")->default(0);
            $table->text("comment")->nullable();
            $table->datetime("commented_date_time")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_by_agents');
    }
}
