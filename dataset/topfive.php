<?php
//Muodosta tietokantayhteys
require_once('../db.php');
 // Lue region get-parametri muuttujaan
$genre = $_GET['genre'];
$con = createDbConnection();

//sql lause
$sql = 
    "SELECT primary_title, average_rating, num_votes 
    FROM titles INNER JOIN title_ratings on titles.title_id = title_ratings.title_id 
    INNER JOIN title_genres on titles.title_id = title_genres.title_id
    WHERE num_votes > 10000 && genre like '%" . $genre . "%'
    ORDER BY average_rating DESC 
    LIMIT 5;";

// kysely kantaan
$prepare = $con->prepare($sql);
$prepare->execute();

// Tallenna vastaus
$rows = $prepare->fetchAll();

// Tulosta 
$html = '<h1>' . $genre . '</h1>';
$html .= '<li>';
foreach ($rows as $row) {
    $html .= '<li>' . $row['primary_title'] . ' Rating: ' . $row['average_rating'] . '</li>';
}
$html .= '</li>';
echo $html;
