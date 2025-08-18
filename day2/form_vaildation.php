<?php
    $name = $_REQUEST["name"];

    if (empty($name)) {
        echo "Please enter your name";
    }else {
        echo "Hello, " . htmlspecialchars($name) . "<br>";
    }

    // Vaildating Email
    $email = $_REQUEST["email"];

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Vaild email:" . htmlspecialchars($email);
    }else {
        echo "Invaild Email Format";
    }

    function validate_age($age, $min = 1, $max = 100){
        if (is_numeric($age) && $age >= $min && $age <= $max) {
            return true;
        }else {
            return false;
        }
    }

    $age = $_REQUEST["age"];

    if (validate_age($age)) {
        echo "Vaild age: " . htmlspecialchars($age);
    } else {
        echo "Invaild age, Please enter a number between 1 and 100";
    }
    
?>