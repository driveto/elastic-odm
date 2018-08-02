<?php

declare(strict_types=1);

namespace ElasticOdm\Annotation;

class PropertyAnnotationList
{
    /** @var array */
    private $propertyAnnotations;

    /** @var PropertyAnnotation[] $propertyAnnotations */
    public function __construct(array $propertyAnnotations)
    {
        $this->propertyAnnotations = $propertyAnnotations;
    }

    public function getPropertyAnnotationsCount(): int
    {
        return count($this->propertyAnnotations);
    }

    public function hasPropertyAnnotations(): bool
    {
        return $this->getPropertyAnnotationsCount() > 0;
    }

    /** @return PropertyAnnotation[] */
    public function getPropertyAnnotations(): array
    {
        return $this->propertyAnnotations;
    }
}
