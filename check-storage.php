<?php
define('LARAVEL_START', microtime(true));
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

echo "<h2>Diagnostic Storage Check</h2>";

$paths = [
    'settings' => 'storage/app/public/settings',
    'programs' => 'storage/app/public/programs',
    'gallery' => 'storage/app/public/gallery',
];

foreach ($paths as $name => $relPath) {
    $absPath = base_path($relPath);
    echo "<h3>Check: $name</h3>";
    echo "Path: $absPath <br>";
    if (file_exists($absPath)) {
        echo "Exists: <span style='color:green'>YES</span><br>";
        echo "Is Dir: " . (is_dir($absPath) ? 'YES' : 'NO') . "<br>";
        echo "Is Readable: " . (is_readable($absPath) ? 'YES' : 'NO') . "<br>";
        echo "Permissions: " . substr(sprintf('%o', fileperms($absPath)), -4) . "<br>";
        
        $files = scandir($absPath);
        echo "File Count: " . (count($files) - 2) . "<br>";
        if (count($files) > 2) {
            echo "First 5 files: <br><ul>";
            $i = 0;
            foreach ($files as $f) {
                if ($f === '.' || $f === '..') continue;
                $fPath = $absPath . '/' . $f;
                echo "<li>$f - " . (is_readable($fPath) ? '<span style='color:green'>Readable</span>' : '<span style='color:red'>NOT Readable</span>') . "</li>";
                if (++$i >= 5) break;
            }
            echo "</ul>";
        }
    } else {
        echo "Exists: <span style='color:red'>NO</span><br>";
    }
    echo "<hr>";
}
