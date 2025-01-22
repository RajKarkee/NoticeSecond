<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';
    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name =$this->ask('Enter name');
        $email =$this->ask('Enter email');
        $password =$this->ask('Enter password');
        $user = User::create([
            'name'=> $name,
            'email'=> $email,
            'password'=> Hash::make($password),
            ]);
    }
}
