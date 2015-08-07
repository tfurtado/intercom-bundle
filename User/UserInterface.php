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

use DateTime;

/**
 * The Users resource is the primary way of interacting with Intercom.
 *
 * This interface describe the fields you can create or update for a user.
 *
 * @author Tiago Furtado <tfurtado@gmail.com>
 */
interface UserInterface
{
    /**
     * A unique string identifier for the user. It is required on creation if an email is not supplied.
     *
     * @return string|null
     */
    public function getUserId();

    /**
     * The user’s email address. It is required on creation if a userId is not supplied.
     *
     * @return string|null
     */
    public function getEmail();

    /**
     * The time the user signed up
     *
     * @return DateTime|null
     */
    public function getSignedUpAt();

    /**
     * The time the user signed up
     *
     * @return string|null
     */
    public function getName();
}
