<?php

namespace App\Services\Mail;

interface EmailInterface
{
    public function send(string $from, string $to, string $subject, string $body): void;
}
