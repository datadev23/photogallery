<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once '../includes/database.php';
        require_once '../includes/user.php';
if(isset($database))  {echo "true";} else {echo "false";}
echo "</br>";

echo $database->mysql_prep("It's working?"). "</br>";
/*
$sql  = "INSERT INTO users (id, username, password, first_name, last_name) ";
 $sql .= "VALUES (1, 'kskoglund', 'secretpwd', 'Kevin', 'Skoglund')";
$result = $database->query($sql);

if($result)
{
  echo "query has successfully been created";
}
*/
/*
$sql = "SELECT * FROM users WHERE id=1";
$result = $database->query($sql);
$found_user = $database->fetch_array($result);
echo $found_user['username'];
 * /*
 */
/*
$firstuser = new User();
$founduser = $firstuser->find_by_id(1);
echo $founduser['username'];
 * /*
 * 
 * 
 */

$found_user = User::find_by_id(1);
echo $found_user['username'];


$users = User::find_all();

foreach($users as $user) {
  echo "User: ". $user->username ."<br />";
  echo "Name: ". $user->full_name() ."<br /><br />";
}


        ?>
    </body>
</html>
