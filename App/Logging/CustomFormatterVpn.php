<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class CustomFormatterVpn extends LineFormatter
{
    public function __construct()
    {
        $format = "%datetime% linux-oracle laravelvpn: %message%\n";
        parent::__construct($format, 'M d H:i:s', true, true);
    }
}
