<?php

declare(strict_types=1);

namespace ElasticOdm\Types;

use ElasticOdm\Mapping;

/**
 * @Mapping\Type
 */
class MixedAnnotationType
{
    /**
     * @Mapping\BooleanType()
     * @Mapping\Embed("\ElasticOdm\Types\Engine")
     */
    private $engine;
}
