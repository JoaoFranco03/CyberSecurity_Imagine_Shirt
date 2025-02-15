<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class CustomFormatter2fa extends LineFormatter
{
    public function __construct()
    {
        $format = "%datetime% linux-oracle laravel2fa: %message%\n";
        parent::__construct($format, 'M d H:i:s', true, true);
    }
}