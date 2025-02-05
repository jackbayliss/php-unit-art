<?php

namespace JackBayliss\PhpUnitArt\Subscribers;

use PHPUnit\Event\TestRunner\ExecutionFinished;
use PHPUnit\Event\TestRunner\ExecutionFinishedSubscriber;
use JackBayliss\PhpUnitArt\Exceptions\ArtNotFoundException;

class AsciiFinishedSubscriber implements ExecutionFinishedSubscriber
{
    public function __construct(public string $file = 'sebbyb')
    {
    }

    /**
     * @throws ArtNotFoundException
     */
    public function notify(ExecutionFinished $event): void
    {
        $artPath = implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'art', $this->file]);

        if (!file_exists($artPath)) {
            throw new ArtNotFoundException("The specified art does not exist!");
        }
        $artContent = file_get_contents($artPath);

        echo "\n" .  $artContent;
    }
}
