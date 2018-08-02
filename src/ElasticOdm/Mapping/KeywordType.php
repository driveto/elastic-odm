<?php

declare(strict_types=1);

namespace ElasticOdm\Mapping;

/**
 * @Annotation
 */
class KeywordType implements IType
{
    public function serializeName(): string
    {
        return 'keyword';
    }
}
