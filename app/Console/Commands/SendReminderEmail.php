<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\DueRemainderEmail;
use App\Models\VisitorCredential;
use Illuminate\Support\Facades\Mail;

class SendReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $visitors = VisitorCredential::all();

        foreach($visitors as $visitor){
            if($visitor->due !=0){
                Mail::to($visitor->email)->send(new DueRemainderEmail($visitor));
                $this->info('Scheduled Mail Job Excecuted');
            }
        }
    }
}
