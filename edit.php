<?php
    include_once("config.php");

    if( isset($_POST['update']))
    {
        $ID = mysqli_real_escape_string($mysqli, $_POST['ID']);
        $birthday = mysqli_real_escape_string($mysqli, $_POST['birthday']);
        $Name = mysqli_real_escape_string($mysqli, $_POST['Name']);

        if( empty($birthday) || empty($Name)){
            if(empty($birthday)){
                echo "<font color='red' > Birthday field is empty. </font><br/>";
            }
            if(empty($Name)){
                echo "<font color='red' > Name field is empty. </font><br/>";
            }

            echo "<br/><a href='javascript:self.history.back();'>Go back</a>";
    

        } else {
            $result = mysqli_query($mysqli, "UPDATE birthdays set birthday='$birthday',Name='$Name' WHERE ID=$ID");
            header("location: index.php");
        }
    }
?>

<?php
    $ID = $_GET['ID'];

    $result = mysqli_query($mysqli, "SELECT * from birthdays where ID=$ID");

    while($res = mysqli_fetch_array($result))
    {
        $birthday = $res['birthday'];
        $Name = $res['Name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Edit Data</title>
</head>
<body>

    <form name="form1" method="post" action="edit.php">
        <table width="25%" border="0">
            <tr>
                <td>Birthday</td>
                <td><input type="text" name="birthday" value="<?php echo $birthday;?>"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Name" value="<?php echo $Name;?>"></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="ID" value="<?php echo $_GET['ID'];?>">
                </td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>

</body>
</html>