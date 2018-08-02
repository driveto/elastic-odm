<?php

declare(strict_types=1);

namespace ElasticOdm\AnnotatedClass;

use PHPUnit\Framework\TestCase;

class ClassListGetterTest extends TestCase
{
    /** @var \ElasticOdm\AnnotatedClass\ClassListGetter */
    private $classListGetter;

    public function setUp(): void
    {
        parent::setUp();

        $this->classListGetter = new ClassListGetter();
    }

    public function testClassGetterGetsAllClasses(): void
    {
        self::assertSame(
            [
                'ElasticOdm\AnnotatedClass\AnnotatedClassTestData\MyExtendedClass',
                'ElasticOdm\AnnotatedClass\AnnotatedClassTestData\MyClass',
                'ElasticOdm\AnnotatedClass\AnnotatedClassTestData\AnotherClass',
            ],
            $this->classListGetter->getClassesList(__DIR__.'/../../../fixtures/AnnotatedClass/AnnotatedClassTestData')
                                  ->getClasses()
        );
    }
}
