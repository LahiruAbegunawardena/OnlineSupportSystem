<?php

use Illuminate\Database\Seeder;

class SupportAgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('support_agents')->insert([
            [
                "agent_name" => "ABC Computer Repair Centre",
                "email" => "abc.comrep@gmail.com",
                "password" => bcrypt("abc1234"),
                "address" => "No 21-B, Galle Road, Dehiwala",
                "contact_number" => "0112123456"
            ], [
                "agent_name" => "ARC PC Centre",
                "email" => "arc@gmail.com",
                "password" => bcrypt("arc1234"),
                "address" => "No 52, Mendis Road, Dehiwal",
                "contact_number" => "0112698523"
            ]
        ]);
    }
}
