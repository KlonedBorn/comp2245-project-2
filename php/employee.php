<?php session_start();
    require_once './init-env.php';
$stmt = $db->query ("SELECT * FROM Users");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
function get_options($results) {
    $var = "";
    foreach ($results as $employee):
        $var = $var. "<option value ="."\"".$employee['firstname']." ".$employee['lastname']."\"".">" . $employee['firstname'] . " " .$employee['lastname'] . "</option>";
    endforeach;
    return $var;
}
echo get_options($results)
?>