# nova-card-log, [Packagist](https://packagist.org/packages/falbar/nova-card-log), [Nova packages](https://novapackages.com/packages/falbar/nova-card-log)

## Install

To install package, you need run command:

```bash
composer require falbar/nova-card-log
```

## Usage

Add the card tools to your dashboard:

```php
use Falbar\NovaCardLog\NovaCardLog;

protected function cards()
{
    return [
        NovaCardLog::make(),
        ...
    ];
}
```
