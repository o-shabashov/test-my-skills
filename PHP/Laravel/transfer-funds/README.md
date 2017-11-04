# Task 2, transfer funds between users

## Install

```shell
git clone https://o-shabashov@bitbucket.org/o-shabashov/robo-finance.git
cd robo-finance/task-2
composer install
cp .env.example .env
php artisan key:generate
```

* Create DB `test`
* Edit `.env` for your needs

```shell
php artisan migrate
php artisan db:seed
```

## Usage

```shell
php artisan user:transfer {sender_id} {recipient_id} {amount}
```