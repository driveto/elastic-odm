<?php

declare(strict_types=1);

namespace ElasticOdm\Types;

use ElasticOdm\Mapping;

/**
 * @Mapping\Type
 */
class Engine
{
    /** @Mapping\KeywordType() */
    private $name;

    /** @Mapping\IntegerType() */
    private $displacement;
}
