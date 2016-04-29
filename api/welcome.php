<?php
    header('Content-Type: application/json; charset=utf-8');
    $commands = [
    'random' => 'your_color'
    ];
    echo json_encode($commands);