<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ecphp
 */

declare(strict_types=1);

use drupol\PhpCsFixerConfigsPhp\Config\Php73;

$reflexion = new ReflectionClass(Php73::class);
$directory = dirname($reflexion->getFileName(), 5);

$config = require $directory . '/drupol/php-conventions/config/php73/php_cs_fixer.config.php';
$rules = $config->getRules();

$rules['header_comment'] = [
    'comment_type' => 'PHPDoc',
    'header' => trim(file_get_contents(__DIR__ . '/../../resource/header.txt')),
    'location' => 'after_open',
    'separate' => 'both',
];

return $config->setRules($rules);
