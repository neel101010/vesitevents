<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Register;
use App\Models\User;
use Illuminate\Console\Command;

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
//        $events = Event::where('date',date('Y-m-d'))->get();
//        foreach ($events as $event){
//            $users_registers = Register::where('event_id',$event->id)
//                ->where('send_remainder',0)
//                ->get();
//            foreach ($users_registers as $users_register){
//                $user = User::find($users_register->user_id);
//                $users_register->send_remainder = 1;
//                $basic  = new \Nexmo\Client\Credentials\Basic('208c20c2', 'dOEtRew2SEbYZwzS');
//                $client = new \Nexmo\Client($basic);
//                try{
//                    $message = $client->message()->send([
//                        'to' => $user->phone_number,
//                        'from' => 'Vesit Events',
//                        'text' => $event->name.' is scheduled on '. $event->date. ' at '. $event->time
//                    ]);
//                    $users_register->save();
//                }
//                catch (\Exception $e){
//                    continue;
//                }
//            }
//        }
        $basic  = new \Nexmo\Client\Credentials\Basic('208c20c2', 'dOEtRew2SEbYZwzS');
        $client = new \Nexmo\Client($basic);
        $message = $client->message()->send([
            'to' => '918291597204',
            'from' => 'Vesit Events',
            'text' =>'hi'
        ]);
        $this->info('Successfully sent remainder');
    }
}
