<?php

declare(strict_types=1);

namespace ElasticOdm\AnnotatedClass\AnnotatedClassTestData;

final class MyExtendedClass extends MyClass
{
    public function sayHiAndTryToConfuseClassGetter(): string
    {
        $confusingString = 'Class namespace';

        return $confusingString;
    }
}
