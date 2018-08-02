<?php

declare(strict_types=1);

namespace ElasticOdm\Types;

use ElasticOdm\Mapping;

/**
 * @Mapping\Type
 */
class Car
{
    /**
     * @Mapping\KeywordType()
     */
    private $make;

    /** @Mapping\KeywordType() */
    private $model;

    /** @Mapping\TextType() */
    private $description;

    /** @Mapping\FloatType() */
    private $acceleration;

    /** @Mapping\BooleanType() */
    private $isFast;

    /** @Mapping\Embed("\ElasticOdm\Types\Engine") */
    private $engine;
}
