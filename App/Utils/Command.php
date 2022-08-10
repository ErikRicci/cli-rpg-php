<?php

namespace App\Utils;

class Command
{
    private int $writeDelay = 0;
    private string $message = '';
    private string $color = "\033[0m";

    public function typewrited(float $writeDelay = 0.01)
    {
        $this->writeDelay = $writeDelay * 1000000;
        return $this;
    }

    private function write()
    {
        if ($this->writeDelay > 0) {
            $explodedMessage = str_split($this->message);
            foreach ($explodedMessage as $letter) {
                echo "{$this->color}$letter";
                usleep($this->writeDelay);
            }
        } else {
            echo "{$this->color}{$this->message}";
        }
    }

    public function info(string $message, bool $inline = false)
    {
        $inline ? $message .= "" : $message .= "\n";
        $this->message = $message;
        $this->color = "\033[0m";
        $this->write();
    }

    public function warning(string $message, bool $inline = false)
    {
        $inline ? $message .= "" : $message .= "\n";
        $this->message = $message;
        $this->color = "\033[31m";
        $this->write();
    }

    public function debug(string $message, bool $inline = false)
    {
        $inline ? $message .= "" : $message .= "\n";
        $this->message = $message;
        $this->color = "\033[36m";
        $this->write();
    }

    public function extra(string $message, bool $inline = false)
    {
        $inline ? $message .= "" : $message .= "\n";
        $this->message = $message;
        $this->color = "\033[33m";
        $this->write();
    }

    public function success(string $message, bool $inline = false)
    {
        $inline ? $message .= "" : $message .= "\n";
        $this->message = $message;
        $this->color = "\033[32m";
        $this->write();
    }

    public function newLine(int $times = 1)
    {
        for ($i = 0; $i < $times; $i++) {
            echo "\n";
        }
    }

    public function clear()
    {
        $this->newLine(50);
    }
}
