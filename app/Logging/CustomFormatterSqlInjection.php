<?php

namespace App\Logging;

use Monolog\Formatter\LineFormatter;

class CustomFormatterSqlInjection extends LineFormatter
{
  public function __construct()
  {
    $format = "%datetime% linux-oracle sql-injection: %message%\n";
    parent::__construct($format, 'M d H:i:s', true, true);
  }
}
