# SHOT

Calling HTTP requests by class encapsulating

Example:-

```php
<?php

use Komtcho\Shot\Contracts\ShootingGet;
use Komtcho\Shot\Contracts\WithHeaders;
use Komtcho\Shot\Shooting;

class Request extends Shooting implements WithHeaders, ShootingGet
{
    protected $url = 'https://webhook.site/9148264c-19c9-4c35-b0f9-0d71cdec3c9d';

    public function headers(): array
    {
        return [
            'X-First' => 'foo',
            'X-Second' => 'bar',
        ];
    }

    public function query(): array
    {
        return [];
    }
}

// Calling
$request = new Request;
return $request->call();
```
