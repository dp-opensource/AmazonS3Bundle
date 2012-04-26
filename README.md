AmazonS3Bundle
================

This bundle provides a simple integration of the "[Amazon Web Services SDK](/amazonwebservices/aws-sdk-for-php)" into Symfony2.

``` php
<?php

$s3 = $this->container->get('digital_pioneers_amazon_s3');
````

The bundle provides a new `digital_pioneers_amazon_s3` service that returns an instance of
`AmazonS3`.

## Installation

To install this bundle, you'll need both the [Amazon Web Services SDK](/amazonwebservices/aws-sdk-for-php)
and this bundle. Installation depends on how your project is setup:

### Step 1: Installation using the `bin/vendors.php` method

If you're using the `bin/vendors.php` method to manage your vendor libraries,
add the following entries to the `deps` file at the root of your project file:

```
[AWS-SDK]
    git=http://github.com/amazonwebservices/aws-sdk-for-php.git

[AmazonS3Bundle]
    git=http://github.com/digitalpioneers/AmazonS3Bundle.git
    target=bundles/DigitalPioneers/AmazonS3Bundle
```

Next, update your vendors by running:

``` bash
$ ./bin/vendors install
```

Great! Now go to *Step 2*.

### Step2: Configure the autoloader

Add the following entries to your autoloader:

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    // ...

    'DigitalPioneers'	=> __DIR__.'/../vendor/bundles'
));

// somewere at the end of this file
//AWS-SDK uses it's own auto loading
require_once __DIR__.'/../vendor/AWS-SDK/sdk.class.php';

```

### Step3: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...

        new DigitalPioneers\AmazonS3Bundle\DigitalPioneersAmazonS3Bundle(),
    );
}
```

Congratulations! You're ready to use [Amazon Web Services SDK](/amazonwebservices/aws-sdk-for-php) into Symfony2!

## Basic Usage

tbd

``` php
<?php

// tbd

```

##License and Author

Readme template from awesome [SensioBuzzBundle](/sensio/SensioBuzzBundle)!

Author:: Ole Michaelis (<o.michaelis@digitalpioneers.de>)
Author:: Florian Holzhauer (<f.holzhauer@digitalpioneers.de>)

Copyright:: 2012, Digital Pioneers N.V.

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
