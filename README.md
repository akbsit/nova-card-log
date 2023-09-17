# nova-card-log, [Packagist](https://packagist.org/packages/akbsit/nova-card-log), [Nova packages](https://novapackages.com/packages/akbsit/nova-card-log)

## Install

To install package, you need run command:

```bash
composer require akbsit/nova-card-log
```

## Usage

Add the card tools to your dashboard:

```php
use Akbsit\NovaCardLog\NovaCardLog;

protected function cards()
{
    return [
        NovaCardLog::make(),
        ...
    ];
}
```
