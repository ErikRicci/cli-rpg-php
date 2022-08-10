<?php

namespace App\Screens\Menu;

use App\Models\Character;
use App\Screens\BaseScreen;
use Ramsey\Uuid\Uuid;

class Login extends BaseScreen
{
    public function render()
    {
        $this->info('Please, insert your login: ');
        $login = readline('');
        $this->newLine();
        $this->info('Please, insert your password: ');
        $password = readline_hidden('');
        $this->newLine();

        $char = Character::query()
            ->firstWhere([
                'login' => $login,
                'password' => Uuid::uuid5('ae3756a9-a77d-4c8d-afca-f74d392702b6', $password)
            ]);

        if (! $char) {
            $this->warning('Wrong credentials. Logging out!');
            exit_run();
        }

        $GLOBALS['character'] = $char;
    }
}