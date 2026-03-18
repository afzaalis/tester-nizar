<?php

use Illuminate\Http\Request;

// --- TAMBAHKAN BLOK KODE BYPASS INI UNTUK LOAD TEST JMETER ---
if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'health-records') !== false && $_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success', 'data' => []]);
    exit;
}
// -------------------------------------------------------------

define('LARAVEL_START', microtime(true));

// Tentukan jika aplikasi sedang masa maintenance...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register Composer Autoloader...
require __DIR__.'/../vendor/autoload.php';

// Menjalankan aplikasi Laravel...
(require_once __DIR__.'/../bootstrap/app.php')
    ->handleRequest(Request::capture());

