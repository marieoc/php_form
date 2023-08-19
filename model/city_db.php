<?php

    // Select function
    function select_city_name($city) {
        global $db;

        $query = 'SELECT * FROM city
                    WHERE Name = :city
                    ORDER BY Population DESC';

        $statement = $db->prepare($query);

        $statement->bindValue(':city', $city);

        $statement->execute();
        $results = $statement->fetchAll(); // fetchAll return an array

        $statement->closeCursor();
        return $results;
    };

    // Insert function
    function insert_city($newcity, $countrycode, $district, $newpopulation) {
        global $db;
        $count = 0;

        $query = 'INSERT INTO city
                    (Name,CountryCode,District,Population)
                    VALUES
                        (:newcity, :countrycode, :district, :newpopulation) 
                    ';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':newcity', $newcity);
        $statement->bindValue(':countrycode', $countrycode);
        $statement->bindValue(':district', $district);
        $statement->bindValue(':newpopulation', $newpopulation);

        if ($statement->execute()) {
            $count = $statement->rowCount(); // if success, count would be 1
        };
        $statement->closeCursor(); // after executing the statement, needs to close the cursor
        return $count;
    };

    // Update function
    function update_city($id, $city, $countrycode, $district, $population) {
        global $db;
        $count = 0;

        $query = 'UPDATE city
                SET Name = :city, CountryCode = :countrycode, District = :district, Population = :population
                WHERE ID = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':countrycode', $countrycode);
        $statement->bindValue(':district', $district);
        $statement->bindValue(':population', $population);

        if ($statement->execute()) {
            $count = $statement->rowCount(); // if success, count would be 1
        };
        $statement->closeCursor();
        return $count;
    };

    // Delete function
    function delete_city($id) {
        global $db;
        $count = 0;

        $query = 'DELETE FROM city
                    WHERE ID = :id';

        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        
        if ($statement->execute()) {
            $count = $statement->rowCount(); // if success, count would be 1
        };
        $statement->closeCursor();

        return $count;
    };
