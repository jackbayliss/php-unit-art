<?php

namespace JackBayliss\PhpUnitArt\Extensions;

use JackBayliss\PhpUnitArt\Subscribers\AsciiFinishedSubscriber;
use PHPUnit\Runner\Extension\Extension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

class AsciiExtension implements Extension
{
    public function bootstrap(Configuration $configuration, Facade $facade, ParameterCollection $parameters): void
    {
        if ($configuration->noOutput()) {
            return;
        }

        $facade->registerSubscriber(new AsciiFinishedSubscriber($parameters->art ?? 'sebbyb'));
    }
}
