<?php

declare(strict_types=1);

namespace ElasticOdm\Mapping;

/**
 * @Annotation
 */
class BooleanType implements IType
{
    public function serializeName(): string
    {
        return 'boolean';
    }
}
