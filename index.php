<?php

//error_reporting(0);
require 'connect.php';

$records = array();

$sql = "SELECT * FROM people";

if($results =$db->query($sql))
{
    if($results->num_rows)
    {   
        //$rows = $results->fetch_all(MYSQLI_ASSOC);
        //$rows = $results->fetch_array();
        //$rows = $results->fetch_assoc();
        //$rows = $results->fetch_object();
        while($row = $results->fetch_object())
        {   
            //echo $row['first_name], '<hr>';
           //echo $row->first_name;
            $records [] = $row;
        }
        $results->free();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if(!count($records)): ?>
      <p>no records</p>
    <?php else: ?>    
    <table>
        <thead>
            <tr>
                <td>firstname</td>
                <td>lastname</td>
                <td>bio</td>
                <td>country</td>
                <td>created</td>
                <td>edit</td>
                <td>delete</td>
            </tr>
        </thead>
        <?php foreach($records as $record): ?>
          <tbody>
              <tr>
                  <td><?php echo $record->first_name; ?></td>
                  <td><?php echo $record->last_name; ?></td>
                  <td><?php echo $record->bio; ?></td>
                  <td><?php echo $record->country; ?></td>
                  <td><?php echo $record->created; ?></td>
                  <td><a href="edit.php?id=<?php echo $record->id; ?>">edit</a></td>
                  <td><a href="delete.php?id=<?php echo $record->id; ?>">delete</a></td>
              </tr>
          </tbody>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    <hr>
    <form action="insert.php" method="post">
        <fieldset>
            <legend>insert data:</legend>
            <label>firstname:</label>
            <input type="text" name="firstname" required>
            <br><br>
            <label>lastname:</label>
            <input type="text" name="lastname" required>
            <br><br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <label>bio:</label>
            <input type="text" name="bio" required>
            <br><br>
            <label>country:</label><br>
            <input type="radio" name="country" value="1">usa<br>
            <input type="radio" name="country" value="2">gb<br>
            <input type="radio" name="country" value="3" checked>none<br><br>
            <input type="submit" value="insert">
        </fieldset>
    </form>
</body>

</html>