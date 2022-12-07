<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=style.css> <!--add css file-->
    <title>Dolphin CRM</title>
</head>
<body>
    <header>
        <i class="fa-brands fa-docker"></i>        
        <p class="title">Dolphin CRM</p>
    </header>

    <main>
        <div class="main-header">
            <h1 class="main-title">View Contact</h1>
        </div>

        <div class="main-container">
            <div class="view-contact-header">
                <div class="view-contact-info">
                    <p class="view-contact-title"><i class="fa-solid fa-user"></i><?php echo $contact_res['title'] . " ". $contact_res['firstname'] . " " . $contact_res['lastname']; ?></p>
                    <?php 
                        $created_by_id = $contact_res['created_by'];
                        $created_by_stmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE id=:created_by_id;");
                        $created_by_stmt->bindParam(':created_by_id', $created_by_id);
                        $created_by_stmt->execute();
                        $created_by_results = $created_by_stmt->fetchAll();
                        $created_by_fname = $created_by_results[0]['firstname'];
                        $created_by_lname = $created_by_results[0]['lastname'];
                    ?>
                    <p class="view-contact-created">Created on <?php echo date("F j, Y",strtotime($contact_res['created_at']));?> by <?php echo $created_by_fname . " " . $created_by_lname;?></p>
                    <p class="view-contact-updated">Updated on <?php echo date("F j, Y",strtotime($contact_res['updated_at']));?></p>
                </div>
                <form class="view-contact-btns">
                    <button class="assign-btn" id="assign-btn" name="assign"><i class="fa-solid fa-hand"></i>Assign to me</button>
                    <?php 
                        $contact_type = $contact_res['type'];
                        if($contact_type == "Sales Lead"){
                            $switch_type = "Support";
                            $btn_class = "support-btn";
                        } else{
                            $switch_type = "Sales Lead";
                            $btn_class = "lead-btn";
                        }
                    ?>
                    <button class="<?php echo $btn_class;?>" id="lead-btn" name="lead"><i class="fa-solid fa-down-left-and-up-right-to-center"></i>Switch to <?php echo $switch_type; ?></button>
                </form>
            </div>

            <div class="view-contact-details">
                <div class="view-contact-detail email">
                    <p>Email</p>
                    <p><?php echo $contact_res['email']?></p>
                </div>
                <div class="view-contact-detail company">
                    <p>Company</p>
                    <p><?php echo $contact_res['company']?></p>
                </div>
                <div class="view-contact-detail telephone">
                    <p>Telephone</p>
                    <p><?php echo $contact_res['telephone']?></p>
                </div>
                <?php 
                        $assigned_to_id = $contact_res['assigned_to'];
                        $assigned_to_stmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE id=:assigned_to_id;");
                        $assigned_to_stmt->bindParam(':assigned_to_id', $assigned_to_id);
                        $assigned_to_stmt->execute();
                        $assigned_to_results = $assigned_to_stmt->fetchAll();
                        $assigned_to_fname = $assigned_to_results[0]['firstname'];
                        $assigned_to_lname = $assigned_to_results[0]['lastname'];
                    ?>
                <div class="view-contact-detail assigned-to">
                    <p>Assigned To</p>
                    <p><?php echo $assigned_to_fname . " " . $assigned_to_lname;?></p>
                </div>
            </div>

            <div class="view-contact-notes" id="contact-notes">
                <div class="view-contact-notes-header">
                    <p><i class="fa-regular fa-note-sticky"></i>Notes</p>
                </div>
                <?php 
                $current_contact_id = $contact_res['id'];
                $notes_stmt = $conn->prepare("SELECT * FROM notes WHERE contact_id = :current_contact_id;");
                $notes_stmt->bindParam(':current_contact_id', $current_contact_id);
                $notes_stmt->execute();
                $all_notes = $notes_stmt->fetchAll();
                foreach ($all_notes as $note): 
                    $note_created_by_id = $note['created_by'];
                    $note_created_by_stmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE id=:created_by_id;");
                    $note_created_by_stmt->bindParam(':created_by_id', $created_by_id);
                    $note_created_by_stmt->execute();
                    $note_created_by_results = $note_created_by_stmt->fetchAll();
                    $note_created_by_fname = $note_created_by_results[0]['firstname'];
                    $note_created_by_lname = $note_created_by_results[0]['lastname'];
                    $note_content = $note['comment'];
                ?>
                <div class="view-contact-note">
                    <p class="view-contact-note-title"><?php echo $note_created_by_fname . " " . $note_created_by_lname;?></p>
                    <p class="view-contact-note-info"><?php echo $note_content;?></p>
                    <p class="view-contact-note-date"><?php echo date("F j, Y",strtotime($note['created_at']));?> at <?php echo date("ga", strtotime($note['created_at'])) ?></p>
                </div>
                <?php endforeach;?>
            </div>
            
            <div class="view-contact-addnote">
                <div class="view-contact-addnote-title">Add a note about <?php echo $contact_fname ?></div>
                <textarea name="notes-textarea" id="notes-textarea" cols="30" rows="10" placeholder="Enter details here..."></textarea>
                <div class="save-btn-container">
                    <button type="submit" id="add-note-btn" name="add-note-btn" class="save-note-btn">Save</button>
                </div>
            </div>
            <div id="msg-results"></div>
        </div>
    </main>

    <aside>
        <div class="aside-container">
            <ul>
                <li><i class="fa-solid fa-house"></i><p><a href="dashboard.html">Home</a></p></li>
                <li><i class="fa-solid fa-user"></i><p><a href="contact.html">New Contact</a></p></li>
                <li><i class="fa-solid fa-users"></i><p><a href="users.html">Users</a></p></li>
            </ul>
            <hr>
            <div class="logout"><i class="fa-solid fa-right-from-bracket"></i><p><a href="logout.php">Logout</a></p></div>
        </div>
    </aside>
    <script src="viewcontact.js" defer></script>
</body>
</html>