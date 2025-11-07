<?php
if (isset($_POST['text'])) {
    try {
        include 'includes/DatabaseConnection.php';
        include 'includes/DatabaseFunctions.php';

        //$sql = 'INSERT INTO question SET
        //text = :text,
        //date = CURDATE(),
        //image = :image,
        //userid = :userid,
        //moduleid = :moduleid';
        //$stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':text', $_POST['text']);
        //$stmt->bindValue(':image', $_POST['image'] . ".jpg");
        //$stmt->bindValue(':userid', $_POST['userid']);
        //$stmt->bindValue(':moduleid', $_POST['moduleid']);
        //$stmt->execute();

        insertQuestion($pdo, $_POST['text'], $_POST['image'], $_POST['userid'], $_POST['moduleid']);
        header('location: questions.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';
    $title = 'Add a new question';
    $users = allUsers($pdo);
    $modules = allModules($pdo);
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
