<?php
    require('model/database.php');
    require('model/city_db.php');

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $countrycode = filter_input(INPUT_POST, 'countrycode', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $district = filter_input(INPUT_POST, 'district', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $population = filter_input(INPUT_POST, 'population', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (!$action) {
            $action = 'create_read_form';
        }
    }

    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$city) {
        $city = filter_input(INPUT_GET, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    switch($action) {
        case 'select':
            if ($city) {
                $results = select_city_name($city);
                include('view/update_delete_form.php');
            } else {
                $error_message = 'Invalid city data. Check all fields';
                include('view/error.php');
            }; 
            break;
            
        case 'insert':
            if ($city && $countrycode && $district && $population) {
                $count = insert_city($city, $countrycode, $district, $population);
                header("Location: .?action=select&city={$city}&created={$count}");
            } else {
                $error_message = 'Invalid city data. Check all fields';
                include('view/error.php');
            }; 
            break;
            
        case 'update':
            if ($id && $city && $countrycode && $district && $population) {
                $count = update_city($id, $city, $countrycode, $district, $population);
                header("Location: .?action=select&city={$city}&updated={$count}");
            } else {
                $error_message = 'Invalid city data. Check all fields';
                include('view/error.php');
            }; 
            break;
            
        case 'delete':
            if ($id) {
                $count = delete_city($id);
                header("Location: .?deleted={$count}"); // redirect with header
            } else {
                $error_message = 'Invalid city data.';
                include('view/error.php');
            }; 
            break;

        default:
            include('view/create_read_form.php');
    }