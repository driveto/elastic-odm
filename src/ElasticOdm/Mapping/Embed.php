<?php

declare(strict_types=1);

namespace ElasticOdm\Mapping;

/**
 * @Annotation
 */
class Embed
{
    private $embed;

    public function __construct(array $args)
    {
        $this->embed = $args['value'];
    }

    /**
     * @return mixed
     */
    public function getEmbed()
    {
        return $this->embed;
    }
}
