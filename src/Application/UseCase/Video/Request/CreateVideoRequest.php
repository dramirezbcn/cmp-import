<?php

namespace Application\UseCase\Video\Request;

/**
 * Class CreateVideoRequest
 * @package Application\UseCase\Video\Request
 */
class CreateVideoRequest
{
    /** @var  string */
    private $name;

    /** @var  string */
    private $url;

    /** @var  array */
    private $labels;

    /**
     * CreateVideoRequest constructor.
     * @param string $name
     * @param string $url
     * @param array|null $labels
     */
    public function __construct(string $name, string $url, array $labels = [])
    {
        $this->name = $name;
        $this->url = $url;
        $this->labels = $labels;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function getLabels(): array
    {
        return $this->labels;
    }
}