<?php
/**
 * This file is part of the intercom-bundle
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * (c) Tiago Furtado <tfurtado@gmail.com>
 */

namespace TFurtado\Bundle\IntercomBundle\User;

use Intercom\IntercomAbstractClient;

/**
 * Manages users using Intercom API client
 *
 * @author Tiago Furtado <tfurtado@gmail.com>
 */
class UserManager
{
    /**
     * @var IntercomAbstractClient
     */
    protected $client;

    /**
     * @var UserSerializer
     */
    protected $serializer;

    /**
     * @param IntercomAbstractClient $client
     * @param UserSerializer $serializer
     */
    public function __construct(IntercomAbstractClient $client, UserSerializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * Sends a user to Intercom API
     *
     * @param UserInterface $user
     */
    public function createUser(UserInterface $user)
    {
        $this->client->createUser($this->serializer->serialize($user));
    }
}
