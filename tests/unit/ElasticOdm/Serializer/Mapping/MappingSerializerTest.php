<?php

declare(strict_types=1);

namespace ElasticOdm\Serializer\Mapping;

use ElasticOdm\Annotation\PropertyAnnotationResolver;
use ElasticOdm\Types\Car;
use ElasticOdm\Types\Engine;
use PHPUnit\Framework\TestCase;

class MappingSerializerTest extends TestCase
{
    public function testSerializeEngine()
    {
        $serializer = new MappingSerializer(
            new PropertyAnnotationResolver()
        );

        $mapping = $serializer->serialize(Engine::class);

        $expectation = [
            'name' => [
                'type' => 'keyword'
            ],
            'displacement' => [
                'type' => 'integer'
            ]
        ];

        self::assertEquals($expectation, $mapping);
    }

    public function testSerializeCar()
    {
        $serializer = new MappingSerializer(
            new PropertyAnnotationResolver()
        );

        $mapping = $serializer->serialize(Car::class);

        $expectation = [
            'make' => [
                'type' => 'keyword',
            ],
            'model' => [
                'type' => 'keyword',
            ],
            'description' => [
                'type' => 'text',
            ],
            'acceleration' => [
                'type' => 'float',
            ],
            'isFast' => [
                'type' => 'boolean',
            ],
            'engine' => [
                'properties' => [
                    'name' => [
                        'type' => 'keyword'
                    ],
                    'displacement' => [
                        'type' => 'integer'
                    ]
                ]
            ]
        ];

        self::assertEquals($expectation, $mapping);
    }
}
