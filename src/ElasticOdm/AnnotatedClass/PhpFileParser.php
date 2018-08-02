<?php

declare(strict_types=1);

namespace ElasticOdm\AnnotatedClass;

use ElasticOdm\AnnotatedClass\Exception\NoClassException;
use ElasticOdm\AnnotatedClass\Exception\NoNamespaceException;

class PhpFileParser
{
    public function getNamespace(string $filePath): string
    {
        $tokens = token_get_all(file_get_contents($filePath));
        $namespace = '';
        $runningThroughNAmespaceDeclaration = false;

        for ($i = 0; $i < count($tokens); ++$i) {
            $currentToken = $tokens[$i];
            if (true === is_array($currentToken)) {
                if (T_NAMESPACE === $currentToken[0]) {
                    $runningThroughNAmespaceDeclaration = true;
                    continue;
                }
            } else {
                if (';' === $currentToken && true === $runningThroughNAmespaceDeclaration) {
                    return trim($namespace);
                }
            }

            if (true === $runningThroughNAmespaceDeclaration) {
                if (true === is_array($currentToken)) {
                    $namespace .= $currentToken[1];
                }
            }
        }

        throw new NoNamespaceException(
            sprintf('No namespace was found in %s', $filePath)
        );
    }

    public function getClassname(string $filePath): string
    {
        $tokens = token_get_all(file_get_contents($filePath));
        $runningThroughClassDeclaration = false;

        for ($i = 0; $i < count($tokens); ++$i) {
            $currentToken = $tokens[$i];

            if (true === $runningThroughClassDeclaration && true === is_array($currentToken)) {
                if (T_WHITESPACE !== $currentToken[0]) {
                    return trim($currentToken[1]);
                }
            }

            if (true === is_array($currentToken)) {
                if (T_CLASS === $currentToken[0]) {
                    $runningThroughClassDeclaration = true;
                }
            }
        }

        throw new NoClassException(
            sprintf('No class was found in %s', $filePath)
        );
    }

    public function buildFqcnFromClassAndNamespace(
        string $namespace,
        string $classname
    ): string {
        return $namespace.'\\'.$classname;
    }
}
