# Guide CodeIgniter3 Page Permission

A Guideline (CodeIgniter3) create page permissions with Hooks (Extending the Framework Core)

## Requirements
-  PHP ^7.4
-  Composer ^2

## Accounts

|#|Username|Password|Role|
|---|---|---|---|
|1|admin|admin|admin|
|2|editor|editor|editor|
|3|auditor|auditor|auditor|

## Site maps

- login
- dashboard
- report
- archive
- logout

## Permission Metrics
|#|Role|Page::Dashboard|Page::Report|Page::Archive|
|---|---|:---:|:---:|:---:|
|1|admin|✔|✔|✔|
|2|editor|✔|✔|-|
|3|auditor|✔|-|✔|

## Scripts
```shell
# Install dependency
composer install
```
