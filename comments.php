<?php   
    $code = $_GET['code'];
    
    if ($code) {
        
        $mysqli = new mysqli("localhost", "root", "root", "test");
        if ($mysqli->connect_errno) {
            echo "Fallo al conenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        $query = "SELECT c.commentid, c.comment, c.date, u.name, u.avatar FROM comments as c
                  JOIN users as u
                  WHERE c.userid = u.userid
                  LIMIT ". ($code - 1) .", 3";
        //$qry = "SELECT * FROM comments LIMIT ". ($code - 1) .", 3";
        $comments = $mysqli->query($query);
        
        if ($comments->num_rows > 0) {
            $result->comments = array();
            while ($fila = $comments->fetch_assoc()) {
                $result->comments[$fila['commentid']] = $fila;
            }
            echo json_encode($result);
        } else {
            echo '{"error":"There are not any comment"}';
        }
    } else {
        echo '{"error":"true"}';
        
    }
?>
