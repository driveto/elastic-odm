<?php

declare(strict_types=1);

namespace ElasticOdm\AnnotatedClass\AnnotatedClassTestData;

use ElasticOdm\Mapping;

/** @Mapping\Type */
final class MyExtendedClass extends MyClass
{
	/**
	 * @Mapping\BooleanType
	 * @var bool
	 */
	private $isThisClassUseless;

    public function sayHiAndTryToConfuseClassGetter(): string
    {
        $confusingString = 'Class namespace';

        return $confusingString;
    }
}
