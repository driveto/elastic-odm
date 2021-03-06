<?php

declare(strict_types=1);

namespace ElasticOdm\Query\Filter\Type;

use PHPUnit\Framework\TestCase;

class QueryFilterTypeEnumTest extends TestCase
{
    /**
     * @param QueryFilterTypeEnum $enum
     * @param string $expectedValue
     * @dataProvider provideEnums
     */
    public function testGetValue(QueryFilterTypeEnum $enum, string $expectedValue): void
    {
        $actualValue = $enum->getValue();

        self::assertEquals($expectedValue, $actualValue);
    }

    /**
     * @return mixed[][]
     */
    public function provideEnums(): array
    {
        return [
            [
                new QueryFilterTypeEnum(QueryFilterTypeEnum::FILTER_TYPE_BOOL),
                'bool'
            ]
        ];
    }
}
