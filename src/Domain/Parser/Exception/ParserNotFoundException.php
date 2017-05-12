<?php

namespace Domain\Parser\Exception;

/**
 * Class ParserNotFoundException
 * @package Domain\Parser\Exception
 */
class ParserNotFoundException extends \Exception
{
    /**
     * ParserNotFoundException constructor.
     * @param string $message
     */
    public function __construct($message = '')
{
    parent::__construct("parser.exception.not.found:$message");
}
}
