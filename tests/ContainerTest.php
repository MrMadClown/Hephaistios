<?php

namespace Tests;

use MrMadClown\Hephaistios\Container;
use MrMadClown\Hephaistios\Singleton;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function testGet(): void
    {
        $factory = $this->getMockBuilder(\stdClass::class)
            ->addMethods(['__invoke'])
            ->getMock();
        $factory->expects(static::once())
            ->method('__invoke');

        $container = new Container([
            'TEST' => $factory
        ]);

        $container->get('TEST');
    }

    public function testSingleton(): void
    {
        $factory = $this->getMockBuilder(\stdClass::class)
            ->addMethods(['__invoke'])
            ->getMock();
        $factory->expects(static::once())
            ->method('__invoke')
            ->willReturn('TEST IMPLEMENTATION');

        $container = new Container([
            'TEST' => new Singleton(\Closure::fromCallable($factory))
        ]);

        $container->get('TEST');
        $container->get('TEST');
    }
}
