<?php
function totalQuestions($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}
function query($pdo, $sql, $parameters = []){
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}
function getQuestion($pdo, $id){
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}
function updateQuestion($pdo, $id, $text) {
    $query = 'UPDATE question SET text = :text WHERE id = :id';
    $parameters = [':text' => $text, ':id' => $id];
    query($pdo, $query, $parameters);
}
function deleteQuestion($pdo, $id){
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}
function insertQuestion($pdo, $text, $image, $userid, $moduleid) {
    $query = 'INSERT INTO question (text, date, image, userid, moduleid)
              VALUES (:text, CURDATE(), :image, :userid, :moduleid)';
    $parameters = [':text' => $text, ':image' => $image . '.jpg', ':userid' => $userid, ':moduleid' => $moduleid];
    query($pdo, $query, $parameters);
}
function allUsers($pdo) {
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}
function allModules($pdo) {
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}
function allQuestions($pdo) {
    $questions = query($pdo, 'SELECT question.id, text, `name`, email, modulename, image FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $questions->fetchAll();
}