<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
     protected $signature = 'user:create {--name=} {--email=} {--class_id=} {--password=} {--token=}';

    /**
     * The console command description.
     *
     * @var string
     */
     protected $description = 'Create user and token';

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
        $user = User::create([
            'name' => $this->option('name'),
            'email' => $this->option('email'),
            'class_id' => $this->option('class_id'),
            'password' => bcrypt($this->option('password'))
        ]);

        $token = $user->createToken($this->option('token'))->accessToken;

        $this->line($token);
    }
}
