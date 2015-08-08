# TFurtado's Intercom Bundle

Intercom.io Bundle for the Symfony Framework.

Installation
============

Step 1: Download the Bundle
---------------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require "tfurtado/intercom-bundle ~1.0"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new TFurtado\Bundle\IntercomBundle\TFurtadoIntercomBundle(),
        );

        // ...
    }

    // ...
}
```

Step 3: Minimum configuration
-----------------------------

With the bundle enabled in the application's kernel, you need to add the
following parameters needed by bundle's services:

* `tfurtado_intercom.auth.app_id`: the Intercom App ID
* `tfurtado_intercom.auth.api_key`: the API key used to access the application

Refer to [Intercom API Docs](https://doc.intercom.io/api/#authorization) if
you have any trouble finding that information.