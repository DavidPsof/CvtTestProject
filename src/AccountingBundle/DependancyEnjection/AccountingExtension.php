<?php

namespace AccountingBundle\DependancyEnjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Routing\Loader\YamlFileLoader;


class AccountingExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {

    }
}