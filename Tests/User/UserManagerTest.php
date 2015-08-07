<?php
/**
 * This file is part of the intercom-bundle
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Tiago Furtado <tfurtado@gmail.com>
 */
namespace TFurtado\Bundle\IntercomBundle\Tests\User;

use TFurtado\Bundle\IntercomBundle\User\UserInterface;
use TFurtado\Bundle\IntercomBundle\User\UserManager;
use TFurtado\Bundle\IntercomBundle\User\UserSerializer;
use Intercom\IntercomAbstractClient;
use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;

/**
 * @author Tiago Furtado <tfurtado@gmail.com>
 */
class UserManagerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UserManager
     */
    protected $manager;

    /**
     * @var IntercomAbstractClient|MockObject
     */
    protected $client;

    /**
     * @var UserSerializer|MockObject
     */
    protected $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->client = $this->getMockBuilder(IntercomAbstractClient::class)
            ->setMethods(['createUser'])
            ->getMock();
        $this->serializer = $this->getMock(UserSerializer::class, [], [], '', false);

        $this->manager = new UserManager($this->client, $this->serializer);
    }

    /**
     * @test
     */
    public function createUserShouldSerializeAndDelegateCreationToClient()
    {
        $serialized = [];
        $user = $this->anUser();
        $this->serializer->expects($this->once())->method('serialize')->with($user)->willReturn($serialized);
        $this->client->expects($this->once())->method('createUser')->with($serialized);

        $this->manager->createUser($user);
    }

    /**
     * @return UserInterface|MockObject
     */
    protected function anUser()
    {
        $user = $this->getMockForAbstractClass(UserInterface::class);
        return $user;
    }
}
