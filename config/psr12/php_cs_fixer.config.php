<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

$reflexion = new ReflectionClass(Php73::class);
$directory = dirname($reflexion->getFileName(), 5);

return require $directory . '/drupol/php-conventions/config/psr12/php_cs_fixer.config.php';
