<?php

require 'connect.php';

$id = $_GET['id'];

if($result = $db->query("SELECT * FROM people WHERE id = $id"))
{
    $row = $result->fetch_object();
}
?>

<form action="update.php?id=<?php echo $row->id; ?>" method="post">
    <fieldset>
        <legend>update data:</legend>
        <label>firstname:</label>
        <input type="text" name="firstname" placeholder="<?php echo $row->first_name; ?>"><br><br>
        <label>lastname:</label>
        <input type="text" name="lastname" placeholder="<?php echo $row->last_name; ?>"><br><br>
        <label>bio:</label>
        <input type="text" name="bio" placeholder="<?php echo $row->bio; ?>"><br><br>
        <label for="country">country:</label><br>
        <input type="radio" name="country" value="1" <?php if($row->country == 1){echo "checked";} ?>>usa<br>
        <input type="radio" name="country" value="2" <?php if($row->country == 2){echo "checked";} ?>>gb<br>
        <input type="radio" name="country" value="3" <?php if($row->country == 3){echo "checked";} ?>>none<br>
        <br><br>
        <input type="submit" value="update">
    </fieldset>
</form>