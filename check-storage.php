<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Diagnostic Storage (Standalone)</h1>";

$baseDir = __DIR__;
echo "Base Directory: $baseDir <br><hr>";

$targets = [
    'Internal Settings' => 'storage/app/public/settings',
    'Internal Programs' => 'storage/app/public/programs',
    'Internal Gallery' => 'storage/app/public/gallery',
    'Public Storage Mirror' => 'public/storage',
];

foreach ($targets as $label => $relPath) {
    $fullPath = $baseDir . '/' . $relPath;
    echo "<h2>$label</h2>";
    echo "Path: $fullPath <br>";
    
    if (file_exists($fullPath)) {
        echo "Status: <b style='color:green'>Exists</b><br>";
        echo "Type: " . (is_link($fullPath) ? 'Symbolic Link' : (is_dir($fullPath) ? 'Directory' : 'File')) . "<br>";
        echo "Permissions: " . substr(sprintf('%o', fileperms($fullPath)), -4) . "<br>";
        
        if (is_dir($fullPath)) {
            $files = scandir($fullPath);
            echo "Items count: " . count($files) . "<br>";
            echo "Items list: <ul>";
            foreach ($files as $file) {
                if ($file === '.' || $file === '..') continue;
                $filePath = $fullPath . '/' . $file;
                $readable = is_readable($filePath) ? '<span style="color:green">Readable</span>' : '<span style="color:red">NOT Readable</span>';
                echo "<li>$file - $readable</li>";
            }
            echo "</ul>";
        }
    } else {
        echo "Status: <b style='color:red'>Not Found</b><br>";
    }
    echo "<hr>";
}

echo "<h1>Database Check</h1>";
try {
    define('LARAVEL_START', microtime(true));
    require $baseDir.'/vendor/autoload.php';
    $app = require_once $baseDir.'/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();

    echo "<h2>Programs Thumbnails in DB:</h2><ul>";
    $programs = \App\Models\Program::pluck('thumbnail');
    foreach ($programs as $thumb) {
        $exists = file_exists(base_path('storage/app/public/' . $thumb)) ? '<span style="color:green">File Found</span>' : '<span style="color:red">File NOT Found</span>';
        echo "<li>$thumb - $exists</li>";
    }
    echo "</ul>";

    echo "<h2>Gallery Images in DB:</h2><ul>";
    $gallery = \App\Models\Gallery::pluck('image');
    foreach ($gallery as $img) {
        $exists = file_exists(base_path('storage/app/public/' . $img)) ? '<span style="color:green">File Found</span>' : '<span style="color:red">File NOT Found</span>';
        echo "<li>$img - $exists</li>";
    }
    echo "</ul>";

} catch (\Exception $e) {
    echo "Database Check Error: " . $e->getMessage();
}
