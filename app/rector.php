<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

// Configuration aligned with phpstan.neon (same target PHP version, same
// analyzed paths, reusing the PHPStan config so Rector benefits from the
// same type information).
return RectorConfig::configure()
                   ->withPaths([
                       __DIR__ . '/src',
                   ])
                   ->withSkip([
                       __DIR__ . '/vendor',
                   ])
    // level: 6 in phpstan.neon
                   ->withPhpVersion(80400)
                   ->withPhpSets(php84: true)
    // Reuses the paths/settings defined for PHPStan
                   ->withPHPStanConfigs([__DIR__ . '/phpstan.neon',])
                   ->withPreparedSets(deadCode: true);
