<form action="" method="post">
    <label for='text'>Type your question here:</label>
    <textarea name="text" rows="2" cols="40"></textarea>

    <label for='text'>Select a User:</label>
    <select id="user" name="userid">
        <option value="">User</option>
        <?php foreach ($users as $user): ?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>
    
    <label for='text'>Select a Module:</label>
    <select id="module" name="moduleid">
        <option value="">Module</option>
        <?php foreach ($modules as $module): ?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['modulename'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>

    <label for='image'>Type your image here:</label>
    <textarea name="image" rows="2" cols="40"></textarea>

    <!--select id="image" name="image">
        <option value="pic1.jpg">pic1</option>
        <option value="pic2.jpg">pic2</option>
        <option value="pic3.jpg">pic3</option>
        <option value="pic4.jpg">pic4</option>
    </select-->
    <input type="submit" name="submit" value="Add">
</form>