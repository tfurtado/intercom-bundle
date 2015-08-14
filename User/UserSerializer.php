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

/**
 * Creates the representation for a User resource to be sent to Intercom.io API
 *
 * @author Tiago Furtado <tfurtado@gmail.com>
 */
class UserSerializer
{
    /**
     * @param  UserInterface $user
     * @return array
     */
    public function serialize(UserInterface $user)
    {
        $serialized = [
            'user_id' => $user->getUserId(),
            'email' => $user->getEmail(),
            'name' => $user->getName(),
        ];

        $signedUpAt = $user->getSignedUpAt();
        if (null !== $signedUpAt) {
            $serialized['signed_up_at'] = $signedUpAt->getTimestamp();
        }

        return $serialized;
    }
}
