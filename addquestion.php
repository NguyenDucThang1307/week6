<?php
if (isset($_POST['text'])) {
    try {
        include 'includes/DatabaseConnection.php';

        $sql = 'INSERT INTO question SET
        text = :text,
        date = CURDATE(),
        image = :image
        userid = :userid';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':text', $_POST['text']);
        $stmt->bindValue(':image', $_POST['image'] . ".jpg");
        $stmt->bindValue(':userid', $_POST['userid']);
        $stmt->execute();
        header('location: questions.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else {
    $title = 'Add a new question';
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
