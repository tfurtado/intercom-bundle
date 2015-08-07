<?php
/**
 * This file is part of the intercom-bundle
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Tiago Furtado <tfurtado@gmail.com>
 */
namespace TFurtado\Bundle\IntercomBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use TFurtado\Bundle\IntercomBundle\DependencyInjection\TFurtadoIntercomExtension;

/**
 * @author Tiago Furtado <tfurtado@gmail.com>
 */
class TFurtadoIntercomExtensionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var ContainerBuilder
     */
    protected $configuration;

    /**
     * @test
     */
    public function allServicesShouldBeDefined()
    {
        $this->configuration = new ContainerBuilder();
        $loader = new TFurtadoIntercomExtension();
        $loader->load([], $this->configuration);
        $this->assertTrue($this->configuration instanceof ContainerBuilder);

        $this->assertHasDefinition('tfurtado_intercom.user.manager');
        $this->assertHasDefinition('tfurtado_intercom.client.basic_auth');
        $this->assertHasDefinition('tfurtado_intercom.user.serializer');
    }

    /**
     * @param  string $serviceId
     */
    protected function assertHasDefinition($serviceId)
    {
        $this->assertTrue($this->configuration->has($serviceId) ?: $this->configuration->hasAlias($serviceId));
    }
}
