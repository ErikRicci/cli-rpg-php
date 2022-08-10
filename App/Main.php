<?php

namespace App;

use App\Screens\Menu\Login;
use App\Screens\Menu\Register;
use App\Screens\Menu\Title;
use App\Screens\Other\Intro;
use App\Utils\Command;

class Main extends Command
{
    public function run()
    {
        (new Title())->load();
        $this->info('Do you already have an account? (y/n)');
        $hasAccount = strtolower(readline());
        $this->newLine();
        if (! in_array($hasAccount, ['y', 'yes', 'n', 'no'])) {
            $this->warning('Invalid option!');
            exit_run();
        };

        if ($hasAccount == 'y' || $hasAccount == 'yes') {
            (new Login())->load();
        } else {
            (new Register())->load();
            $this->debug('Please, proceed to login');
            exit_run();
        }

        $this->success($GLOBALS['character']->name." logged in. Prepare for battle!");
        $this->success("EXP: ".$GLOBALS['character']->experience);

        if ($GLOBALS['character']->experience >= 100) {
            sleep(3);

            $this->info("Wow! It seems your character have too much exp! Come back later for more adventures :)");
            $this->newLine();
            exit_run();
        }

        (new Intro())->withFrame()->load();

        $this->debug('Then goodbye :)');
        exit_run();
    }
}
