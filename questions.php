<?php
try{
    include 'includes/DatabaseConnection.php';
    include 'includes/DatabaseFunctions.php';

    //$sql = 'SELECT question.id, text, `name`, email, modulename, image FROM question
    //INNER JOIN user ON userid = user.id
    //INNER JOIN module ON moduleid = module.id';

    $questions = allQuestions($pdo);
    $title = 'Question List';
    $totalQuestions = totalQuestions($pdo);

    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
} catch(PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>