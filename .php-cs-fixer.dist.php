<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

$config = require __DIR__ . '/config/php73/php_cs_fixer.config.php';

$config
    ->getFinder()
    ->in(['config/']);

$config
    ->getFinder()
    ->ignoreDotFiles(false)
    ->name(['.php-cs-fixer.*']);

return $config;
