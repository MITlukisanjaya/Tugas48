<?php
$app->get('/','App\Controllers\MahasiswaController:index')->setName('mahasiswa');
$app->get('/create','App\Controllers\MahasiswaController:create')
    ->setName('create');
$app->post('/createAction','App\Controllers\MahasiswaController:createAction');

$app->get('/edit/{id}','App\Controllers\MahasiswaController:edit')
    ->setName('create');
$app->post('/editAction','App\Controllers\MahasiswaController:editAction');
