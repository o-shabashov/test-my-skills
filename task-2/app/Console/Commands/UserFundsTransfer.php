<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use DB;

class UserFundsTransfer extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'user:transfer 
                            {sender_id : The ID of sender} 
                            {recipient_id : The ID of recipient} 
                            {amount : Amount of transferred funds}';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Transfer funds from user ID to user ID';

    /**
     * Create a new command instance.
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @return mixed
     */
    public function handle()
    {
        $sender    = User::findOrFail($this->argument('sender_id'));
        $recipient = User::findOrFail($this->argument('recipient_id'));
        $amount    = (float)$this->argument('amount');

        if ($amount <= 0) {
            $this->error('Something went wrong!');
            throw new \Exception('Amount should be bigger than zero');
        }

        if ($sender->balance - $amount < -config('database.max_user_balance')) {
            throw new \Exception('Sender insufficient funds');
        }

        if ($recipient->balance + $amount > config('database.max_user_balance')) {
            throw new \Exception('Overflow recipient balance');
        }

        DB::transaction(function () use ($sender, $recipient, $amount) {
            $sender->balance    -= $amount;
            $recipient->balance += $amount;

            $sender->save();
            $recipient->save();
        }, 5);
    }
}
