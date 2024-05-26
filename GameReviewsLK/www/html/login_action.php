<?php
include 'prolog.php';

function validateUser($username, $password)
{
    $file = './xml/users.xml';

    if (!file_exists($file)) {
        exit('Soubor neexistuje: ' . $file);
    }
    if (!is_readable($file)) {
        exit('Soubor nelze číst: ' . $file);
    }
    libxml_use_internal_errors(true);
    $xml = simplexml_load_file($file);
    if ($xml === false) {
        echo "Chyby při načítání XML s uživateli:\n";
        foreach(libxml_get_errors() as $error) {
            echo "\t", $error->message;
        }
        exit;
    }
    foreach ($xml->user as $user) {
        if ($user->username == $username && $user->password == $password) {
            return true;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (validateUser($username, $password)) {
        setJmeno($username);
        header("Location: index.php");
    } else {
        echo '<script type="text/javascript">toastr.error("Neplatné uživatelské jméno nebo heslo.")</script>';
    }
}

