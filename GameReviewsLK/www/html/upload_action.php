<?php
require_once 'prolog.php';
include 'toastr.php';
function validateXML($xmlFile, $xsdFile)
{
    $xml = new DOMDocument();
    if (!$xml->load($xmlFile)) {
        return false;
    }

    if (!$xml->schemaValidate($xsdFile)) {
        return false;
    }

    return true;
}

function transformXML($xmlFile, $xslFile)
{
    $xml = new DOMDocument();
    if (!$xml->load($xmlFile)) {
        return false;
    }

    $xsl = new DOMDocument();
    if (!$xsl->load($xslFile)) {
        return false;
    }

    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);

    $transformed = $proc->transformToXML($xml);
    if (!$transformed) {
        return false;
    }

    return $transformed;
}

function appendToGamesXML($newGameXML)
{
    $gamesXMLFile = __DIR__ . '/xml/games.xml';
    $gamesXML = new DOMDocument();
    $gamesXML->preserveWhiteSpace = false;
    $gamesXML->formatOutput = true;

    if (!$gamesXML->load($gamesXMLFile)) {
        return false;
    }

    $newGames = new DOMDocument();
    if (!$newGames->loadXML($newGameXML)) {
        return false;
    }

    $gamesRoot = $gamesXML->documentElement;

    $newGameNodes = $newGames->getElementsByTagName('game');
    foreach ($newGameNodes as $newGameNode) {
        $importedNode = $gamesXML->importNode($newGameNode, true);
        $gamesRoot->appendChild($importedNode);
    }

    if (!$gamesXML->save($gamesXMLFile)) {
        return false;
    }

    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES) && isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] !== UPLOAD_ERR_NO_FILE) {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['fileToUpload']['name']);
    $xsdFile = 'xml/schema.xsd'; 
    $xslFile = 'src/xsl/transform.xsl';

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
        if (validateXML($uploadFile, $xsdFile)) {
            $transformedXML = transformXML($uploadFile, $xslFile);
            if ($transformedXML) {
                if (appendToGamesXML($transformedXML)) {
                    echo '<script type="text/javascript">toastr.success("Review upload successful.")</script>';
                }
            }
        } else {
            echo '<script type="text/javascript">toastr.error("Review not valid based on XSD.")</script>';
        }
    } else {
        echo '<script type="text/javascript">toastr.error("Review upload error")</script>';
    }
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<script type="text/javascript">toastr.error("Review file not found.")</script>';
    }
}

