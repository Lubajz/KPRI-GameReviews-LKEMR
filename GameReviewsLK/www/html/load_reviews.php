<?php

$gamesXMLFile = 'xml/games.xml'; 
$games = loadGamesFromXML($gamesXMLFile); 

function loadGamesFromXML($xmlFile) {
    $games = [];
    $xml = simplexml_load_file($xmlFile);
    if ($xml) {
        foreach ($xml->game as $game) {
            $gameData = [
                'title' => (string)$game->title,
                'release_date' => (string)$game->release_date,
                'genre' => (string)$game->genre,
                'developer' => (string)$game->developer,
                'rating' => (int)$game->rating,
                'review' => (string)$game->review
            ];
            $games[] = $gameData;
        }
    }
    return $games;
}

function generateRatingStars($rating) {
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $stars .= '<span class="fa fa-star checked"></span>';
        } else {
            $stars .= '<span class="fa fa-star"></span>';
        }
    }
    return $stars;
}

function format_date($originalDate){
    $formattedDate = date("d F Y", strtotime($originalDate));
    return $formattedDate;
}