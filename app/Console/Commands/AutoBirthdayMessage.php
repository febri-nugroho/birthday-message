<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Client;

class AutoBirthdayMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:birthdaymessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto Send Birthday Message Email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get();

        foreach ($users as $user) {
            // get timezone by location
            $date_val = Carbon::now($user->location)->format('Y-m-d');
            $time_val = Carbon::now($user->location)->format('H:i');

            if ($date_val == $user->birthday) {
                // check time from timezone country
                if($time_val == "09:00") {
                    // send api
                    $email = $user->email;
                    $message = "Hey, ".$user->first_name." ".$user->last_name." it's your birthday";
                    
                    $client = new Client([
                        'headers' => [ 'Content-Type' => 'application/json' ]
                    ]);

                    $res = $client->post('https://email-service.digitalenvision.com.au/send-email',
                        ['body' => json_encode(
                            [
                                'email' => $email,
                                'message' => $message
                            ]
                        )]
                    );
                    echo var_export($res->getBody()->getContents(), true);
                }
            }
        }
        
                    
        // if ($users->count() > 0 && $users->location == ) {
        //     foreach ($users as $user) {
                
        //     }
        // }
        
        
        // return Command::SUCCESS;
    }
}
