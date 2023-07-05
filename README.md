# RAPI Library / PHP

This is the official repository of the Reactioon API communication library for the PHP language.

## Focus
This library must meet some requirements, see the list below:

1. Simple and easy to use.
2. Easy to maintain/upgrade.
3. Reusable

## Usage
You can use the library with one auth key, if you need use with multiples keys create an new instance of the class.

```php
<?php

require_once("rapi/rapi.php");

$rapi = new RAPI();
$rapi->Load("{reactioon-api-key}", "{reactioon-api-secret}");
$requestReturn = $rapi->Request("GET", "api/v2/bots/spot/all", array());
var_dump($requestReturn);

?>
```


## Considerations
This library is under development and may change over time. The integrity of existing methods will be maintained to avoid compatibility issues in the future.

## Contributions
You can contribute to the development of the ecosystem by helping to improve this library. Feel free to improve and submit your work with a pull request.


@author José Wilker <josewilker@reactioon.com>