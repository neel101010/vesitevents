<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Register;
use App\Models\User;
use Illuminate\Console\Command;
use Twilio\Rest\Client;


class sendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder(s) via SMS using Twilio.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $events = Event::where('date',date('Y-m-d'))->get();
        foreach ($events as $event){
            $users_registers = Register::where('event_id',$event->id)
                ->where('send_remainder',0)
                ->get();
            foreach($users_registers as $users_register){
                $user = User::find($users_register->user_id);
                $users_register->send_remainder = 1;

                $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_AUTH_TOKEN");
                $twilio_number = getenv("TWILIO_NUMBER");
                $client = new Client($account_sid, $auth_token);
                $user_phn = "+91".$user->phone_number;
                $bodytext = $event->name.' is scheduled on '. $event->date. ' at '. $event->time;
                try{
                    $client->messages->create(
                        $user_phn,
                        ['from' => $twilio_number, 'body' => $bodytext]);
                    $users_register->save();

                }

                catch (\Exception $e){
                    echo $e;
                }
            }
        }
        $this->info('Successfully sent remainder');
    }
}
