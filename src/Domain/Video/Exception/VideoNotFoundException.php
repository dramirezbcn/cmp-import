<?php

namespace Domain\Video\Exception;

/**
 * Class VideoNotFoundException
 * @package Domain\Video\Exception
 */
class VideoNotFoundException extends \Exception
{
    /**
     * VideoNotFoundException constructor.
     * @param string $message
     */
    public function __construct($message = '')
{
    parent::__construct("video.exception.not.found:$message");
}
}
