<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;
use App\Models\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crear Usuario Admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //php artisan app:create-user
        $name = 'Administrador';
        $email = 'alvarado.test.sv@gmail.com';
        $password = 'Admin123!';
        $role = 'administrador';
        $estado = 'a';

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->role = $role;
        $user->estado = $estado;
        $user->save();

        $this->info('Usuario creado!');
    }
}
