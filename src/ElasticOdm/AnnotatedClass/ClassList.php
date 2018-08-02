<?php

declare(strict_types=1);

namespace ElasticOdm\AnnotatedClass;

use Consistence\Type\Type;

class ClassList
{
    private $classes;

    public function __construct(array $classes)
    {
        Type::checkType($classes, 'string[]');
        $this->classes = $classes;
    }

    /**
     * @return \ElasticOdm\AnnotatedClass\AnnotatedClass[]
     */
    public function getClasses(): array
    {
        return $this->classes;
    }
}
