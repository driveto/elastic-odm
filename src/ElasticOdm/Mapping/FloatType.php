<?php

declare(strict_types=1);

namespace ElasticOdm\Mapping;

/**
 * @Annotation
 */
class FloatType implements IType
{
    public function serializeName(): string
    {
        return 'float';
    }
}
