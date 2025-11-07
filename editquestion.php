<?php
include 'includes/DatabaseConnection.php';
include 'includes/DatabaseFunctions.php';

try {
    if (isset($_POST['text'])) {
        //$sql = 'UPDATE question SET text = :text WHERE id = :id';
        //$stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':text', $_POST['text']);
        //$stmt->bindValue(':id', $_POST['userid']);
        //$stmt->execute();

        updateQuestion($pdo, $_POST['id'], $_POST['text']);
        header('location: questions.php');
    } else {
        //$sql = 'SELECT * FROM question WHERE id = :id';
        //$stmt = $pdo->prepare($sql);
        //$stmt->bindValue(':id', $_GET['id']);
        //$stmt->execute();
        $question = getQuestion($pdo, $_GET['id']);
        $title = 'Edit question';

        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Error editing question: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>
