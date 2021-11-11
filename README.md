# PHP Logger PSR-3
[![Latest Stable Version](http://poser.pugx.org/devcoder-xyz/php-logging/v)](https://packagist.org/packages/devcoder-xyz/php-logging) [![Total Downloads](http://poser.pugx.org/devcoder-xyz/php-logging/downloads)](https://packagist.org/packages/devcoder-xyz/php-logging) [![Latest Unstable Version](http://poser.pugx.org/devcoder-xyz/php-logging/v/unstable)](https://packagist.org/packages/devcoder-xyz/php-logging) [![License](http://poser.pugx.org/devcoder-xyz/php-logging/license)](https://packagist.org/packages/devcoder-xyz/php-logging) [![PHP Version Require](http://poser.pugx.org/devcoder-xyz/php-logging/require/php)](https://packagist.org/packages/devcoder-xyz/php-logging)
## Installation

Use [Composer](https://getcomposer.org/)

### Composer Require
```
composer require devcoder-xyz/php-options-resolver
```
## Requirements

* PHP version 7.3

**How to use ?**
```php
<?php

$logFileName = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'var' . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.log';

$handler = new \DevCoder\Log\Handler\FileHandler($logFileName);
$logger = new \DevCoder\Log\Logger($handler);

$logger->log(\Psr\Log\LogLevel::EMERGENCY, 'an error has occurred'); 

```

Ideal for small project
Simple and easy!
