<?php

namespace MrMadClown\Hephaistios;

use Psr\Container\ContainerInterface;

final class Singleton
{
    protected mixed $instance;

    public function __construct(private readonly \Closure $factory)
    {
    }

    public final function __invoke(ContainerInterface $container): mixed
    {
        if (!is_null($instance = $this->getInstance())) return $instance;

        return $this->instance = $this->createInstance($container);
    }

    private function createInstance(ContainerInterface $container)
    {
        return ($this->factory)($container);
    }

    private function getInstance(): mixed
    {
        return $this->instance ?? null;
    }
}
