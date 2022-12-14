<?php
    require_once 'init-env.php';
    require_once 'session.php';
    // Fired when contact parameter is set.
    if(isset($_GET['contact'])){
        $contactID = $_GET['contact'];
        $stmt = $db->query("SELECT * FROM Contacts WHERE id = $contactID");
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
        if($contact != false) {
            $_SESSION['current-contact'] = $contact['id'];
            $_SESSION['contact-type'] = $contact['type'];
            header("Location: ../notes.html");
            exit;
        }
    }
    $tableDates = date("Y-m-d H:i:s");
    if(isset($_GET['comment'])){
        $comment = urlencode($_GET['comment']);
        $sql = "INSERT INTO Notes (contact_id, comment, created_by) VALUES ('".$_SESSION['current-contact']."','$comment','".$_SESSION['id']."')";
        $db->query($sql);
        $formatted_date = date_create($date_now);
        $htmlElement = sprintf("
            <p class='details'>     
                <p class='title'>%s</p>
                <p class='body'>%s</p>
                <span class='date-time'>%s</span>
            </p>",
            $_SESSION['firstname'] ." ". $_SESSION['lastname'],
            urldecode(strip_tags($comment)),
            date("F d, Y") . " at " . date("ga"));
        echo $htmlElement;
        exit;
    }

    $contactID = $_SESSION['current-contact']; //GETS ID NUMBER 
    $stmt = $db->query ("SELECT * FROM Contacts WHERE id = '$contactID'");
    $contact = $stmt->fetch(PDO::FETCH_ASSOC); // Get viewed contact
    $stmt = $db->query ("SELECT * FROM Users WHERE id=".$contact['assigned_to']."");
    $assigned = $stmt->fetch(PDO::FETCH_ASSOC); // Get assigned to
    $stmt = $db->query ("SELECT * FROM Users WHERE id=".$contact['created_by']."");
    $created = $stmt->fetch(PDO::FETCH_ASSOC); // Get created by
    $stmt = $db->query ("SELECT * FROM Notes WHERE contact_id='$contactID'");
    $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    if(isset($_GET['action']) && $_GET['action'] == 'assign'){
        $db->query("UPDATE Contacts SET assigned_to= ".$_SESSION['id'].", updated_at = '$tableDates' WHERE id = '".$_SESSION['current-contact']."' ");
        echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
        exit;
    }

    if(isset($_GET['action']) && $_GET['action'] == 'switch'){
        if ($contact['type'] == "Support") {
            $db->query("UPDATE Contacts SET type = 'Sales Lead', updated_at = '$tableDates' WHERE id = ".$_SESSION['current-contact']."");
            echo "Switch to Sales Lead";
        }
        else {
            $db->query("UPDATE Contacts SET type = 'Support', updated_at = '$tableDates' WHERE id = ".$_SESSION['current-contact']."");
            echo "Switch to Support";
        }
        exit;
    }   

    function create_notes($db,$contactID){
        $stmt = $db->query ("SELECT * FROM Notes WHERE contact_id='$contactID'");
        $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(isset($notes)){
            $htmlElement = array();
            foreach ($notes as $note) {
                $htmlContent = sprintf("
                <p class='details'>
                    <p class='title'>%s</p>
                    <p class='body'>%s</p>
                    <span class='date-time'>%s at %s</span>
                </p> <br>",
                $_SESSION['firstname'] ." ". $_SESSION['lastname'],
                urldecode($note['comment']),
                date_format(date_create($note['created_at']),"F d, Y"),
                date_format(date_create($note['created_at']),"ga"));
                array_push($htmlElement,$htmlContent);
            }
            return implode(' ',$htmlElement);
        } else {
            return "No notes";
        }
    }

    if(isset($_GET['refresh']) && $_GET['refresh'] == true)
    {
        $loader = array(
            'prefix-info'=> sprintf("<h1 id='name'>%s</h1>
                <p>Created on %s by %s</p>
                <p>Updated on %s</p>",   
                $contact['title'] ." ". $contact['firstname'] ." ". $contact['lastname'],
                date_format(date_create($contact['created_at']),"F d, Y"),
                $created['firstname']." ".$created['lastname'],
                date_format(date_create($contact['updated_at']),"F d, Y")),
            'further-info'=> sprintf("
                <span class='info-label'> <span class = 'label-spanners'>Email</span> <p class='info-item' id='email-info'>%s</p></span>
                <span class='info-label'> <span class = 'label-spanners'>Telephone</span> <p class='info-item' id='telephone-info'>%s</p></span>
                <span class='info-label'> <span class = 'label-spanners'>Company</span> <p class='info-item' id='company-info'>%s</p></span>
                <span class='info-label'> <span class = 'label-spanners'>Assigned To</span> <p class='info-item' id='assigned-to-info'>%s</p></span>",
                $contact['email'],
                $contact['telephone'],
                $contact['company'],
                $assigned['firstname'] . " " . $assigned['lastname']),
            'note-container' => create_notes($db,$contactID),
            'switch' => "Switch to " . (($contact['type'] == "Support")?"Sales Lead":"Support")
        );
        echo json_encode($loader);
    }
?>