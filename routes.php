<?php

return [
    [
        'uri' => '/', 'verb' => 'GET',
        'action' => [Animal\Controllers\PageController::class, 'welcome'],
    ],
    [
        'uri' => '/loss-declaration/create', 'verb' => 'GET',
        'action' => [Animal\Controllers\LossDeclarationController::class, 'create'],
    ],
    [
        'uri' => '/loss-declaration', 'verb' => 'POST',
        'action' => [Animal\Controllers\LossDeclarationController::class, 'store'],
    ],
    [
        'uri' => '/loss-declaration', 'verb' => 'GET',
        'action' => [Animal\Controllers\LossDeclarationController::class, 'show'],
    ],
];
