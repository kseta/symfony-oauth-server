Symfony OAuth Server Demo Application
========

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kseta/symfony-oauth-server/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kseta/symfony-oauth-server/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/kseta/symfony-oauth-server/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kseta/symfony-oauth-server/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/kseta/symfony-oauth-server/badges/build.png?b=master)](https://scrutinizer-ci.com/g/kseta/symfony-oauth-server/build-status/master)

This is Symfony OAuth Server Demo Application.

- This project create for [Symfony Advent Calendar 2016] The Day 13's post.
- See: http://qiita.com/kseta/items/fc00fc1676985455356a

Requirements
-------------------------------------

- PHP 7.0.0 or higher.
- PDO-MySQL PHP extension enabled.
- [Symfony application requirements].

Installation
-------------------------------------

This application using Composer.

```
$ composer install
```

This command will database create and schema update.

```
$ php app/console doctrine:database:create
$ php app/console doctrine:schema:update --force
```

Usage
-------------------------------------

Just use the PHP build-in web server.

```
$ php app/console server:start
```

This command will start a web server for application.

License
-------------------------------------

[BSD-2-Clause]

Copyright (c) 2016 SETA Keigou and contributors, All rights reserved.

[Symfony application requirements]: http://symfony.com/doc/current/reference/requirements.html
[Symfony Advent Calendar 2016]: http://qiita.com/advent-calendar/2016/symfony
[BSD-2-Clause]: https://opensource.org/licenses/BSD-2-Clause
