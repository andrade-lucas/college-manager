<?php

namespace App\Services\Mail;

class EmailService implements EmailInterface
{
    public function send(string $from, string $to, string $subject, string $body): void
    {
        // @TODO: 
    }
}
