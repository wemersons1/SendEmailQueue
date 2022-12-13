<?php

namespace App\Services;
use App\Jobs\SendEmail;

class SendMailList {
    private $emailConfig;

    public function __construct($emailConfig)
    {
        $this->emailConfig = $emailConfig;
    }

    public function execute() {

        $emails = explode(';', $this->emailConfig->recipient_list);
    
        foreach($emails as $email) {

            SendEmail::dispatch($email, $this->emailConfig->toArray());

        }

    }
}