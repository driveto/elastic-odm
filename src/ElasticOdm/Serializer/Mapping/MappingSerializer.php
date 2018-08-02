<?php

declare(strict_types=1);

namespace ElasticOdm\Serializer\Mapping;

use ElasticOdm\Annotation\PropertyAnnotationResolver;
use ElasticOdm\Serializer\Exception\NoAnnotatedPropertiesFoundException;

class MappingSerializer
{
    private $propertyAnnotationResolver;

    public function __construct(PropertyAnnotationResolver $propertyAnnotationResolver)
    {
        $this->propertyAnnotationResolver = $propertyAnnotationResolver;
    }

    public function serialize(string $typeClass): array
    {
        $propertyAnnotationList = $this->propertyAnnotationResolver->resolveAnnotations($typeClass);

        $properties = [];

        if (false === $propertyAnnotationList->hasPropertyAnnotations()) {
            throw new NoAnnotatedPropertiesFoundException($typeClass);
        }

        foreach ($propertyAnnotationList->getPropertyAnnotations() as $propertyAnnotation) {
            if (true === $propertyAnnotation->hasType()) {
                $properties[$propertyAnnotation->getPropertyName()] = [
                    'type' => $propertyAnnotation->getType()->serializeName()
                ];
            } elseif (true === $propertyAnnotation->hasEmbed()) {
                $properties[$propertyAnnotation->getPropertyName()] = [
                    'properties' => $this->serialize($propertyAnnotation->getEmbed()->getEmbed())
                ];
            }
        }

        return $properties;
    }
}
