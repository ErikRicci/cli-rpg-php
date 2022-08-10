<?php

namespace App\Screens\Menu;

use App\Models\Character;
use App\Screens\BaseScreen;
use Ramsey\Uuid\Uuid;

class Register extends BaseScreen
{
    public function render()
    {
        $this->info('What name would you like to be called?');
        $name = readline('');

        $this->info('What login you are using?');
        $login = readline('');

        $this->info('Finally, choose your password:');
        $password = readline_hidden('');

        $newCharacter = Character::query()->create([
            'name' => $name,
            'login' => $login,
            'password' => Uuid::uuid5('ae3756a9-a77d-4c8d-afca-f74d392702b6', $password)
        ]);

        $this->success("Character $newCharacter->name was created successfully!");
    }
}