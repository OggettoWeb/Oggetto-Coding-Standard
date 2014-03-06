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

1. Для начала, необходимо добавить новый scope, чтобы сниффером проверялись только классы из папки local. Для этого в настройках PHPStorm находим `Scopes`, в них добавляем новый как показано на иллюстриции:   
![Scopes](http://d.pr/i/dq4W+ "Optional title")
2. Далее, находим в настройках раздел `Inspections`, в нем `PHP Code Shiffer validation`:   
![Sniffer](http://d.pr/i/ZEAW+ "Optional title")
3. Нажимаем правой кнопкой мыщи и указываем scope:   
![Scope](http://d.pr/i/d99B+ "Optional title")
![Scope](http://d.pr/i/sb2r+ "Optional title")
![Scope](http://d.pr/i/OGTx+ "Optional title")
4. Выбираем стандарт:   
![Scope](http://d.pr/i/gVVC+ "Optional title")
5. Указываем полный путь к папке со стандартом внутри `vendor`:   
![Scope](http://d.pr/i/vISk+ "Optional title")

Установка в git pre-commit
---

...
