<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true]);
    echo "Success!\n";
} catch (\Throwable $e) {
    echo "ERROR MESSAGE:\n";
    echo $e->getMessage() . "\n";
    echo "\nAT FILE:\n";
    echo $e->getFile() . ":" . $e->getLine() . "\n";
}
