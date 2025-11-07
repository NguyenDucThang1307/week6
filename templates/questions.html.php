<p><?=$totalQuestions?> questions have been submitted to the Student Forum.</p>

<?php foreach($questions as $question): ?>
    <blockquote>
    <strong><em><?=htmlspecialchars($question['modulename'],ENT_QUOTES,'UTF-8')?></em></strong>
    <br /><?=htmlspecialchars($question['text'],ENT_QUOTES,'UTF-8')?>
    

    (by <a href="mailto:<?= htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8'); ?>">
    <?= htmlspecialchars($question['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

    <a href="editquestion.php?id=<?=$question['id']?>">Edit</a>

    <br /><img height="100px" src="image/<?=htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8'); ?>"/>

    <form action="deletequestion.php" method="post">
        <input type="hidden" name="id" value="<?=$question['id']?>">
        <input type="submit" value="Delete">
    </form>
    </blockquote>
    <?php endforeach;?>