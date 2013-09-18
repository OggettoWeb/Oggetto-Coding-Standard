Oggetto Coding Standard
=======================

Репозиторий содержит правила для PHP Code Sniffer, которые автоматизируют 
проверку PHP-кода на соответствие корпоративному стандарту Oggetto Web.

Описание стандарта: http://oggettoweb.github.io/docs/php/code_style/index.html

Установка из консоли
---

1. Установить [composer](http://getcomposer.org/doc/01-basic-usage.md#installation) в папку с проектом
```
$ curl -sS https://getcomposer.org/installer | php
```

2. Добавить в `composer.json`:
```
{
    "require": {
        "oggettoweb/coding_standard": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/OggettoWeb/Oggetto-Coding-Standard"
        }
    ]
}
```

3. Установить стандарт:  
```
$ php composer.phar install
```

4. Запустить сниффер:  
```
$ vendor/bin/phpcs --standard=vendor/oggettoweb/coding_standard/Oggetto/ /path/to/php/code
```

5. Для удобства использования можно добавить алиас в `~/.bashrc`:  
```bash
alias cs="vendor/bin/phpcs --standard=vendor/oggettoweb/coding_standard/Oggetto/"
```
И запускать сниффер вот так:
```
$ cs /path/to/php/code
```

Установка в PHPStorm
---

...

Установка в git pre-commit
---

...
