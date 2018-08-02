<?php

declare(strict_types=1);

namespace ElasticOdm\Mapping;

/**
 * @Annotation
 */
class IntegerType implements IType
{
    public function serializeName(): string
    {
        return 'integer';
    }
}
