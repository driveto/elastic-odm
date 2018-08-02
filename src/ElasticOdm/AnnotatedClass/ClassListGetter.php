<?php

declare(strict_types=1);

namespace ElasticOdm\AnnotatedClass;

use ElasticOdm\AnnotatedClass\Exception\NoClassException;
use ElasticOdm\AnnotatedClass\Exception\NoNamespaceException;
use ReflectionException;
use SplFileInfo;
use Symfony\Component\Finder\Finder;

class ClassListGetter
{
    /** @var \Symfony\Component\Finder\Finder */
    private $finder;

    /** @var \ElasticOdm\AnnotatedClass\PhpFileParser */
    private $phpFileParser;

    public function __construct()
    {
        $this->finder = new Finder();
        $this->phpFileParser = new PhpFileParser();
    }

    public function getClassesList(string $sourceFolderPath): ClassList
    {
        $classes = [];

        $files = $this->finder->files()->in($sourceFolderPath)->name('*.php');

        /** @var SplFileInfo $file */
        foreach ($files as $file) {
            $filePath = $file->getRealpath();

            try {
                $namespace = $this->phpFileParser->getNamespace($filePath);
                $classname = $this->phpFileParser->getClassname($filePath);

                $fqcn = $this->phpFileParser->buildFqcnFromClassAndNamespace($namespace, $classname);

                new \ReflectionClass($fqcn);

                $classes[] = $fqcn;
            } catch (NoClassException $e) {
            } catch (NoNamespaceException $e) {
            } catch (ReflectionException $e) {
            }
        }

        return new ClassList($classes);
    }
}
