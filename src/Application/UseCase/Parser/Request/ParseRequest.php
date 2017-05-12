<?php

namespace Application\UseCase\Parser\Request;

/**
 * Class ParseRequest
 * @package Application\UseCase\Game\Request
 */
class ParseRequest
{
    /** @var  string */
    private $type;

    /**
     * ParseRequest constructor.
     * @param string $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}