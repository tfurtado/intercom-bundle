<?php
/**
 * This file is part of the intercom-bundle
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Tiago Furtado <tfurtado@gmail.com>
 */

namespace TFurtado\Bundle\IntercomBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * TFurtadoIntercomExtension is a Symfony extension to load TFurtadoIntercomBundle services
 *
 * @author Tiago Furtado <tfurtado@gmail.com>
 */
class TFurtadoIntercomExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }
}
