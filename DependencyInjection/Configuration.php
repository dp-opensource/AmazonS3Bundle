<?php

namespace DigitalPioneers\Bundle\AmazonS3Bundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('digital_pioneers_amazon_s3');

        $rootNode
            ->children()
                ->scalarNode('certificate_authority')->defaultFalse()->end()
                ->scalarNode('credentials')->defaultNull()->end()
                ->scalarNode('default_cache_config')->defaultNull()->end()
                ->scalarNode('key')->defaultNull()->end()
                ->scalarNode('secret')->defaultNull()->end()
                ->scalarNode('token')->defaultNull()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
