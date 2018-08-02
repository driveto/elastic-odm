<?php

declare(strict_types=1);

namespace ElasticOdm\Serializer\Exception;

use Exception;
use Throwable;

class NoAnnotatedPropertiesFoundException extends Exception
{
    public function __construct(string $class, Throwable $previous = null)
    {
        parent::__construct('No annotated properties were found in class '.$class, 0, $previous);
    }
}
