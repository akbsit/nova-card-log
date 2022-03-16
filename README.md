# nova-card-log, [Packagist](https://packagist.org/packages/falbar/nova-card-log), [Nova packages](https://novapackages.com/packages/falbar/nova-card-log)

## Установка

Для установки пакета нужно:

```bash
composer require falbar/nova-card-log
```

## Подключение

Подключить в `NovaServiceProvider`:

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
