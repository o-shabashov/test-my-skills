# Senior, feed fish

## Install

```shell
git clone https://o-shabashov@bitbucket.org/o-shabashov/robo-finance.git
cd robo-finance/senior
composer install
cp .env.example .env
php artisan key:generate
```

* Create DB `senior`
* Edit `.env` for your needs

```shell
php artisan migrate
php artisan db:seed
```

## Usage

```shell
php artisan feed-fish
```