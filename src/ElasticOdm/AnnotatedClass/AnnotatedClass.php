<?php

declare(strict_types=1);

namespace ElasticOdm\AnnotatedClass;

class AnnotatedClass
{
    private $fqcn;

    public function __construct(
        string $fqcn
    ) {
        $this->fqcn = $fqcn;
    }

    public function getFqcn(): string
    {
        return $this->fqcn;
    }
}
