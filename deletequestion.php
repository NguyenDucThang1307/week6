<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    //$sql = 'DELETE FROM question WHERE id = :id';
    //$stmt = $pdo->prepare($sql);
    //$stmt->bindValue(':id', $_POST['id']);
    //$stmt->execute();

    deleteQuestion($pdo, $_POST['id']);
    header('location: questions.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete question: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>