<?php

declare(strict_types=1);

namespace ElasticOdm\Annotation;

use ElasticOdm\Annotation\Exception\CombinedAnnotationException;
use ElasticOdm\Mapping\Embed;
use ElasticOdm\Mapping\IntegerType;
use ElasticOdm\Mapping\KeywordType;
use ElasticOdm\Types\Car;
use ElasticOdm\Types\Engine;
use ElasticOdm\Types\MixedAnnotationType;
use PHPUnit\Framework\TestCase;

class PropertyAnnotationResolverTest extends TestCase
{
    public function testResolveAnnotationsOfEngine()
    {
        $propertyAnnotationResolver = new PropertyAnnotationResolver();

        $resolvedAnnotations = $propertyAnnotationResolver->resolveAnnotations(Engine::class);

        self::assertCount(2, $resolvedAnnotations->getPropertyAnnotations());

        $nameProperty = $this->findPropertyByName('name', $resolvedAnnotations);
        $displacementProperty = $this->findPropertyByName('displacement', $resolvedAnnotations);

        self::assertTrue($nameProperty->hasType());
        self::assertFalse($nameProperty->hasEmbed());
        self::assertInstanceOf(KeywordType::class, $nameProperty->getType());

        self::assertTrue($displacementProperty->hasType());
        self::assertFalse($displacementProperty->hasEmbed());
        self::assertInstanceOf(IntegerType::class, $displacementProperty->getType());
    }

    public function testResolveAnnotationsOfCar()
    {
        $propertyAnnotationResolver = new PropertyAnnotationResolver();

        $resolvedAnnotations = $propertyAnnotationResolver->resolveAnnotations(Car::class);

        self::assertCount(6, $resolvedAnnotations->getPropertyAnnotations());

        $makeProperty = $this->findPropertyByName('make', $resolvedAnnotations);
        $engineProperty = $this->findPropertyByName('engine', $resolvedAnnotations);

        self::assertTrue($makeProperty->hasType());
        self::assertFalse($makeProperty->hasEmbed());
        self::assertInstanceOf(KeywordType::class, $makeProperty->getType());

        self::assertFalse($engineProperty->hasType());
        self::assertTrue($engineProperty->hasEmbed());
        self::assertInstanceOf(Embed::class, $engineProperty->getEmbed());
    }

    public function testResolveAnnotationsMixedAnnotation()
    {
        $propertyAnnotationResolver = new PropertyAnnotationResolver();

        $this->expectException(CombinedAnnotationException::class);

        $propertyAnnotationResolver->resolveAnnotations(MixedAnnotationType::class);
    }

    private function findPropertyByName(string $needle, PropertyAnnotationList $haystack): PropertyAnnotation
    {
        foreach ($haystack->getPropertyAnnotations() as $propertyAnnotation) {
            if ($propertyAnnotation->getPropertyName() === $needle) {
                return $propertyAnnotation;
            }
        }

        throw new \InvalidArgumentException('Needle '.$needle.' not found in haystack');
    }
}
