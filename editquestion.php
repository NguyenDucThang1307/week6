<?php
include 'includes/DatabaseConnection.php';

try {
    if (isset($_POST['text'])) {
        $sql = 'UPDATE question SET text = :text WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':text', $_POST['text']);
        $stmt->bindValue(':id', $_POST['userid']);
        $stmt->execute();

        header('location: questions.php');
    } else {
        $sql = 'SELECT * FROM question WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $question = $stmt->fetch();

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
