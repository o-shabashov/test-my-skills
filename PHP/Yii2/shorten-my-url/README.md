# Shorten My Url

[![BCH compliance](https://bettercodehub.com/edge/badge/o-shabashov/shorten-my-url?branch=master)](https://bettercodehub.com/)

Simply proof-of-concept.

## Installation
* Clone repository

```bash
git clone https://github.com/o-shabashov/shorten-my-url.git
cd PHP/Yii2/shorten-my-url
```

* Create MySQL database `shorten-my-url` and import `shorten-my-url.sql`

* Install composer dependencies:

```bash
composer global require "fxp/composer-asset-plugin:^1.2.0"
cd shorten-my-url
composer up
```

* Run server:
```bash
./yii serve
```

## Made with
1. [Yii2](https://github.com/yiisoft/yii2)
2. MySQL
3. PJAX
