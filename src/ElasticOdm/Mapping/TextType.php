<?php

declare(strict_types=1);

namespace ElasticOdm\Mapping;

/**
 * @Annotation
 */
class TextType implements IType
{
    public function serializeName(): string
    {
        return 'text';
    }
}
