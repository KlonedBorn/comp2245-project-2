<?php
    /**
     * Credit to Megaloman for creating this function.
     * Link: https://www.php.net/manual/en/class.pdo.php
     */
    function construct_pdo($file = 'properties.ini') {
        if (!$settings = parse_ini_file($file, TRUE))
            throw new exception('Unable to open ' . $file . '.');
        $dns = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['schema'];
        return new PDO($dns, $settings['database']['username'], $settings['database']['password']);
    }
    
    global $db;
    $db = construct_pdo();
    $nameRegex = "/^[a-z ,.'-]+$/i";
    $phoneRegex = "/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]\d{3}[\s.-]\d{4}$/";
    $passwordRegex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/i";
    $emailRegex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/i";
    global $date;
    $date_now = date("YYYY-MM-DD HH:MM:SS");
    date_default_timezone_set("America/Antigua");

    // Ensure Lyn-Fatt knows to add his own admin user.
    // $firstname = 'Conner';
    // $lastname = 'Alden';
    // $email = 'connor-alden@facade.com';
    // $password = 'FinalC0unt';
    // $hash = password_hash($password,PASSWORD_BCRYPT);
    // $role = 'Admin';
    // $res = $db->query("INSERT IGNORE INTO Users (firstname,lastname,password,email,role) 
    //     VALUES ('$firstname','$lastname','$password','$email','$role')");
?>