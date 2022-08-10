<?php

namespace App\Screens\Menu;

use App\Screens\BaseScreen;

class Title extends BaseScreen
{
    public function render()
    {
        $this->success(" ____  ____   ____ \n|  _ \|  _ \ / ___|\n| |_) | |_) | |  _ \n|  _ <|  __/| |_| |\n|_| \_|_|    \____|\n       ");
        $this->debug('RPG - Random Php Game');
        $this->debug('version 0.0.1 (pre-alpha)');
        $this->info('made by: erik (https://github.com/ErikRicci)');
        $this->info('');
        readline('Press any key to continue...');
        $this->newLine();
    }
}