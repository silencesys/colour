<?php
function errorTranslation($errorCode)
{
    $errorMessage = [
        'C00E' => '',
        'C01E' => '',
        'C02E' => 'Congratulation! You have found our random word.',
        'C03E' => '<b>Error:</b> You\'ve entered wrong formated string for a colour. <br> So instead we are giving you a random one.',
    ];
    return ($errorMessage[$errorCode]);
}
function appTranslation($appCode)
{
    $appMessage = [
        'C00' => '',
        'C01' => '',
        'C02' => 'Congratulation! You have found our random word.',
        'C03' => '<b>Error:</b> You\'ve entered wrong formated string for a colour. <br> So instead we are giving you a random one.',
    ];
    return ($appMessage[$appCode]);
}