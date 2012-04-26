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

Enable the bundle in the kernel:

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

### Step4: Configure the bundle

Finally, configure it:

``` yaml
// app/config/config.yml

digital_pioneers_amazon_s3:
    key: %digital_pioneers_amazon_s3.key%
    secret: %digital_pioneers_amazon_s3.secret%

```

``` ini
// app/config/parameters.ini

digital_pioneers_amazon_s3.key = "<API KEY GOES HERE>"
digital_pioneers_amazon_s3.secret = "<API SECRET GOES HERE>"

```

Congratulations! You're ready to use [Amazon Web Services SDK](/amazonwebservices/aws-sdk-for-php) in Symfony2!

## Basic Usage

Remember this is just a simple wrapper for the original AWS SDK, so you definetly should [read the docs](http://docs.amazonwebservices.com/AWSSDKforPHP/latest/#i=AmazonS3)

``` php
<?php

$s3 = $this->get('digital_pioneers_amazon_s3');
$bucket_name = 'testbucket';
$file_name = 'uploadtest.jpg';
$s3->create_bucket($bucket_name, \AmazonS3::REGION_EU_W1, \AmazonS3::ACL_PUBLIC);
$s3->batch()->create_object($bucket_name, $file_name, array(
    	'fileUpload' => '/tmp/fancyimage.jpg',
    	'acl' => \AmazonS3::ACL_PUBLIC
    )
);
$send_response = $s3->batch()->send();
echo $s3->get_object_url($bucket_name, $file_name);

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
