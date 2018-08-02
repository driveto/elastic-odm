<?php

declare(strict_types=1);

namespace ElasticOdm\Annotation;

use ElasticOdm\Mapping\Embed;
use ElasticOdm\Mapping\IType;

class PropertyAnnotation
{
    private $embed;

    private $type;

    private $propertyName;

    public function __construct(string $propertyName, $annotation)
    {
        $this->propertyName = $propertyName;

        if ($annotation instanceof IType) {
            $this->type = $annotation;
        }

        if ($annotation instanceof Embed) {
            $this->embed = $annotation;
        }
    }

    public function hasEmbed(): bool
    {
        return null !== $this->embed;
    }

    public function hasType(): bool
    {
        return null !== $this->type;
    }

    public function getEmbed(): Embed
    {
        return $this->embed;
    }

    public function getType(): IType
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }
}
