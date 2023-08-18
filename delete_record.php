<?php
    require('database.php');

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT); // retrieving the id in the hidden input

    if ($id) {
        $query = 'DELETE FROM city
                    WHERE ID = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $success = $statement->execute();
        $statement->closeCursor();
    }


    $delete = true;

    include('index.php');
?>
