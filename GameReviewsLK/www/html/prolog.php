<?php

define('INC', __DIR__ . '/include');      
define('XML', __DIR__ . '/xml');           
define('GAMES', __DIR__ . '/games');        


define('TITLE', 'Game Reviewer');

define('TRANSFORM_SERVER_SIDE', true);

// --- session ---
session_start();  

function getJmeno($prefix = ''): string
{
    $jmeno = @$_SESSION['jmeno'];
    return $jmeno ? "$prefix$jmeno" : '';
}

function setJmeno($jmeno = '')
{
    if ($jmeno)
        $_SESSION['jmeno'] = $jmeno;
    else
        unset($_SESSION['jmeno']);
}

function isUser(): bool
{
    return !!getJmeno();
}
