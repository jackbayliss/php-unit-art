<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\Event\TestRunner\ExecutionFinished;
use JackBayliss\PhpUnitArt\Exceptions\ArtNotFoundException;
use JackBayliss\PhpUnitArt\Subscribers\AsciiFinishedSubscriber;

class AsciiFinishedSubscriberTest extends TestCase
{

    /**
     * Test that the subscriber includes the art file if it exists.
     * @covers  JackBayliss\PhpUnitArt\Subscribers\AsciiFinishedSubscriber::notify
     */

    public function testIncludesFileOutputIfFileExists(): void
    {
        $artPath = implode(DIRECTORY_SEPARATOR, [__DIR__, '../src/', 'art', 'artfile']);
        file_put_contents($artPath, 'ASCII Art');

        $subscriber = new AsciiFinishedSubscriber('artfile');

        $reflection = new ReflectionClass(ExecutionFinished::class);

        $event = $reflection->newInstanceWithoutConstructor();

        $subscriber->notify($event);

        $this->expectOutputString("\nASCII Art");

        unlink($artPath);
    }

    /**
     * Test that the subscriber throws an exception if the file doesnt exist.
     * @covers  JackBayliss\PhpUnitArt\Subscribers\AsciiFinishedSubscriber::notify
     */
    public function testThrowsExceptionIfFileNotExists(): void
    {
        $this->expectException(ArtNotFoundException::class);

        $subscriber = new AsciiFinishedSubscriber('iamfake');

        $reflection = new ReflectionClass(ExecutionFinished::class);

        $event = $reflection->newInstanceWithoutConstructor();

        $subscriber->notify($event);
    }
}
