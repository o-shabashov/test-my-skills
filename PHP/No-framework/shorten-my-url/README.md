# Shorten My Url

Using this HTML please implement the following:

1. Site-visitor (V) enters any original URL to the Input field, like
http://anydomain/any/path/etc;
2. V clicks submit button;
3. Page makes AJAX-request;
4. Short URL appears in Span element, like http://yourdomain/abCdE (don't use any
   external APIs as goo.gl etc.);
5. V can copy short URL and repeat process with another link

Short URL should redirect to the original link in any browser from any place and keep
actuality forever, doesn't matter how many times application has been used after that.


Requirements:

1. Use PHP or Node.js;
2. Don't use any frameworks.

## Installation
* Clone repository

```bash
git clone https://github.com/o-shabashov/shorten-my-url.git
cd test-my-skills/PHP/No-framework/shorten-my-url
```

* Change Db config in `db.php`

* Create MySQL database `shorten-my-url` and import `shorten-my-url.sql`

* Run server:

```bash
php -S localhost:8080
```
