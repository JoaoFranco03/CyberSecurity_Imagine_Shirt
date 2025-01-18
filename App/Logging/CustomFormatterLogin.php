<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class CustomFormatterLogin extends LineFormatter
{
    public function __construct()
    {
        $format = "%datetime% linux-oracle laravellogin: %message%\n";
        parent::__construct($format, 'M d H:i:s', true, true);
    }
}