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

use TFurtado\Bundle\IntercomBundle\User\UserSerializer;
use TFurtado\Bundle\IntercomBundle\User\UserInterface;
use PHPUnit_Framework_TestCase;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use DateTime;

/**
 * @author Tiago Furtado <tfurtado@gmail.com>
 */
class UserSerializerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UserSerializer
     */
    protected $serializer;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->serializer = new UserSerializer();
    }

    /**
     * @test
     */
    public function serializeShouldReturnArrayWithBasicKeys()
    {
        $serialized = $this->serializer->serialize($this->anUser());

        $checkKeys = ['user_id', 'email', 'name'];
        foreach ($checkKeys as $key) {
            $this->assertArrayHasKey($key, $serialized);
        }
    }

    /**
     * @test
     */
    public function serializeShouldReturnArrayWithSignedUpKeyIfUserHasSignedUpAtDate()
    {
        $user = $this->anUser();
        $user->expects($this->once())->method('getSignedUpAt')->willReturn($this->getMock(DateTime::class));
        $serialized = $this->serializer->serialize($user);

        $this->assertArrayHasKey('signed_up_at', $serialized);
    }

    /**
     * @return UserInterface|MockObject
     */
    protected function anUser()
    {
        return $this->getMockForAbstractClass(UserInterface::class);
    }
}
