<?php
    // Funktio joka luo genre-pudotusvalikon
    function createGenreDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = 'SELECT DISTINCT genre FROM title_genres;';
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="genre">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['genre'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }

    // Funktio joka luo region-pudotusvalikon
    function createRegionDropDown() {
        // Muodosta tietokantayhteys
        require_once('db.php'); // Ota db.php-tiedosto käyttöön tässä tiedostossa
        $conn = createDbConnection(); // Kutsutaan db.php-tiedostossa olevaa createDbConnection()-funktiota, joka avaa tietokantayhteden
        // Muodosta SQL-lause muuttujaan. Tässä vaiheessa tätä ei vielä ajeta kantaan.
        $sql = "SELECT DISTINCT region FROM aliases;";
       // Aja kysely kantaan
        $prepare = $conn->prepare($sql);
        $prepare->execute();
        // Tallenna vastaus muuttujaan
        $rows = $prepare->fetchAll();
        $html = '<select name="region">';
        // Looppaa tietokannasta saadut rivit läpi
        foreach($rows as $row) {
            // Tulosta jokaiselle riville li-elementti
            $html .= '<option>' . $row['region'] . '</option>';
        }
        $html .= '</select>';
        return $html;
    }