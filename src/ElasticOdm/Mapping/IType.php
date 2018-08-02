<?php

declare(strict_types=1);

namespace ElasticOdm\Mapping;

interface IType
{
    public function serializeName(): string;
}
