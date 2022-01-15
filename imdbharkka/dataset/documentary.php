<?php
    //DB yhteys
    require_once('../db.php');
    $conn = createDbConnection();
    
    //sql lause
    $sql = "SELECT `primary_title` 
    FROM `titles` INNER JOIN title_genres 
    ON titles.title_id = title_genres.title_id 
    WHERE genre 
    LIKE '%Documentary%' LIMIT 10;";

    //Ajaminen
    $prepare = $conn->prepare($sql);
    $prepare->execute();

    //Tallenna vastaus muuttujaan
    $rows = $prepare->fetchAll();
    
    //Print
    $html = '<h1>Documentaries</h1>';
    $html .= '<ul>';
        foreach($rows as $row) {
            $html .= '<li>' . $row['primary_title'] . '</li>';
        }
    $html .= '</ul>';
    echo $html;