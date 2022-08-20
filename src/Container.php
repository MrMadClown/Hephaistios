<?php

namespace MrMadClown\Hephaistios;

use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\ServiceLocatorTrait;

class Container implements ContainerInterface
{
    use ServiceLocatorTrait;
}
