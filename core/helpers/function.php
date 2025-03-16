<?php
function csrf(): void
{
    $_SESSION['token'] = bin2hex(random_bytes(32));
    echo <<<HTML
<input type="hidden" name="_csrf" value="{$_SESSION['token']}">
HTML;
}

// Fonction d'aide pour le débogage.
//Elle affiche les informations détaillées des variables passées en argument puis arrête l'exécution du script.
function dd(mixed ...$args): void
{
    foreach ($args as $arg) {
        var_dump($arg);
    }
    die();
}

function info(string $message): void { //Permet d'ajouter des informations dans un document texte
    $path = __DIR__ . '/../../storage/logs/log.txt';
    file_put_contents($path, $message . PHP_EOL, FILE_APPEND);
}