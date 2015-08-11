**************
IntercomBundle
**************

Provides abstractions to handle Intercom users and integrate Intercom's
official PHP library into Symfony applications.

Basic usage
-----------

Implement UserInterface
"""""""""""""""""""""""

Create a class that implements
``TFurtado\Bundle\IntercomBundle\User\UserInterface`` or make your existing
User class implement it.

All methods may return ``null``, but remember that and user must have either
an ID, an email or both.

Create an user in Intercom
""""""""""""""""""""""""""

Use the user manager (exposed as the ``tfurtado_intercom.user.manager``
service in dependency injection container) to send user data to Intercom::

    // Example inside a controller
    public function myAction()
    {
        $user = new User(/*...*/);
        $userManager = $this->get('tfurtado_intercom.user.manager');
        $userManager->create($user);
    }

