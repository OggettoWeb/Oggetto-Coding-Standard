Oggetto Coding Standard
=======================

Репозиторий содержит правила для PHP Code Sniffer, которые автоматизируют 
проверку PHP-кода на соответствие корпоративному стандарту Oggetto Web.

Описание стандарта: http://oggettoweb.github.io/docs/php/code_style/index.html

Установка и использование
---

1. Установить [composer](http://getcomposer.org/doc/01-basic-usage.md#installation)   
```
curl -sS https://getcomposer.org/installer | php
```

2. Добавить в `composer.json`:
```
{
    "require": {
        "squizlabs/php_codesniffer": "1.*"
    }
}
```
3. ...
