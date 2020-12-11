<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Twilio\Rest\Client;
use App\Models\TappSentMsg;
use App\Models\TappSentMsgFailed;
use App\Models\TappSentMsgLog;

class SendSmsScheduled extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendsms:scheduled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send upto 70 Pending SMS';

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
     * @return int
     */
    public function handle()
    {
        // Your Account SID and Auth Token from twilio.com/console
        $sid    = env( 'TWILIO_SID' );
        $token  = env( 'TWILIO_TOKEN' );
        $client = new Client( $sid, $token );

        $messagesToSend = TappSentMsg::all()->take(70);
        foreach( $messagesToSend as $messageToSend )
        {
            try {
                $client->messages->create(
                    $messageToSend->sms_number,
                    [
                        'from' => $messageToSend->twilio_num,
                        'body' => $messageToSend->message,
                    ]
                );

                // Converting Eloquent object to array for insert operation
                $sentMessageArray = $messageToSend->toArray();
                // removing scheduled_time column from the array
                unset($sentMessageArray['scheduled_time']);

                TappSentMsgLog::insert($sentMessageArray);
                TappSentMsg::where('id', $messageToSend->id)->delete();
                echo('Everything done successfully');
            } catch(Exception $e) {
                TappSentMsgFailed::insert($sentMessageArray);
                TappSentMsg::where('id', $messageToSend->id)->delete();
            }
        }
        return 0;
    }
}

/*
Links:
https://www.cloudways.com/blog/laravel-cron-job-scheduling/
https://laravel.com/docs/8.x/scheduling/
https://tutsforweb.com/how-to-set-up-task-scheduling-cron-job-in-laravel/
*/
