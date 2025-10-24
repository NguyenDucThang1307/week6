<form action="" method="post">
    <input type="hidden" name="userid" value="<?= $question['id']; ?>">
    <label for="text">Edit your joke here:</label>
    <textarea name="text" rows="3" cols="40">
    <?= $question['text'] ?>
    </textarea>
    <input type="submit" name="submit" value="Save">
</form>
