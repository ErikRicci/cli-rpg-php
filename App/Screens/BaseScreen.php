<?php

namespace App\Screens;

use App\Interfaces\ScreenInterface;
use App\Utils\Command;
use ReflectionClass;

class BaseScreen extends Command implements ScreenInterface
{
    private bool $withFrame = false;

    public function render() {}

    public function load()
    {
        if (! $this->withFrame) {
            (new static)->render();
        } else {
            $screenName = (new ReflectionClass(static::class))->getShortName();
            $this->info(str_repeat('=', MAX_WIDTH / 2)." $screenName ".str_repeat('=', MAX_WIDTH / 2));
            (new static)->render();
            $this->info(str_repeat('-', strlen($screenName) + MAX_WIDTH + 2));
        }
    }

    public function withFrame()
    {
        $this->withFrame = true;
        return $this;
    }
}