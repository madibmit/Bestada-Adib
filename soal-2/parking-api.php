<?php
require 'vendor/autoload.php';

$app = new Slim\App();

// Daftar blok parkir dan jumlah slot di masing-masing blok
$parking_blocks = [
    "BlockA" => ["total_slots" => 20, "available_slots" => 10],
    "BlockB" => ["total_slots" => 15, "available_slots" => 5],
    "BlockC" => ["total_slots" => 10, "available_slots" => 8]
];

// API untuk mengecek ketersediaan blok dan slot
$app->get('/parking', function ($request, $response) use ($parking_blocks) {
    return $response->withJson($parking_blocks);
});

// API untuk kendaraan parkir (mengisi slot parkir pada blok tertentu)
$app->post('/parking/{block_name}', function ($request, $response, $args) use ($parking_blocks) {
    $block_name = $args['block_name'];

    if (array_key_exists($block_name, $parking_blocks) && $parking_blocks[$block_name]['available_slots'] > 0) {
        $parking_blocks[$block_name]['available_slots']--;
        return $response->withJson(["message" => "Kendaraan berhasil parkir di Blok $block_name"]);
    } else {
        return $response->withJson(["message" => "Blok tidak tersedia atau penuh"], 400);
    }
});

// API untuk kendaraan parkir keluar
$app->delete('/parking/{block_name}', function ($request, $response, $args) use ($parking_blocks) {
    $block_name = $args['block_name'];

    if (array_key_exists($block_name, $parking_blocks) && $parking_blocks[$block_name]['available_slots'] < $parking_blocks[$block_name]['total_slots']) {
        $parking_blocks[$block_name]['available_slots']++;
        return $response->withJson(["message" => "Kendaraan telah keluar dari Blok $block_name"]);
    } else {
        return $response->withJson(["message" => "Blok tidak ditemukan atau sudah penuh"], 400);
    }
});

$app→run();
?>
