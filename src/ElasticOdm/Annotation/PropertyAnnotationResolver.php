<?php

declare(strict_types=1);

namespace ElasticOdm\Annotation;

use Doctrine\Common\Annotations\AnnotationReader;
use ElasticOdm\Annotation\Exception\CombinedAnnotationException;
use ElasticOdm\Mapping\Embed;
use ElasticOdm\Mapping\IType;

class PropertyAnnotationResolver
{
    public function resolveAnnotations(string $className): PropertyAnnotationList
    {
        $reflectionClass = new \ReflectionClass($className);
        $reader = new AnnotationReader();

        $properties = [];

        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
            $annotations = $reader->getPropertyAnnotations($reflectionProperty);

            if (true === $this->hasCombinedAnnotations($annotations)) {
                throw new CombinedAnnotationException('A property can contain only one \\ElasticOdm\\Mapping\\* annotation.');
            }

            foreach ($annotations as $annotation) {
                if ($annotation instanceof Embed) {
                    $properties[] = new PropertyAnnotation(
                        $reflectionProperty->getName(),
                        $annotation
                    );
                } elseif ($annotation instanceof IType) {
                    $properties[] = new PropertyAnnotation(
                        $reflectionProperty->getName(),
                        $annotation
                    );
                }
            }
        }

        return new PropertyAnnotationList($properties);
    }

    private function hasCombinedAnnotations(array $annotations): bool
    {
        $hasEmbed = false;
        $hasType = false;

        foreach ($annotations as $annotation) {
            if ($annotation instanceof Embed) {
                $hasEmbed = true;
            }

            if ($annotation instanceof IType) {
                $hasType = true;
            }
        }

        return true === $hasEmbed && true === $hasType;
    }
}
