<?php
	include_once("config.php");

	$result = mysqli_query($mysqli, "SELECT * FROM birthdays");
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
	<title>Today In History</title>
</head>
<body>
    <h1 style="text-align: center;"><?php echo "FAMOUS BIRTHDAYS" ?></h1>
	<a href="add.html"><p style="text-align: center;">You are also FAMOUS, so click here to add your birthday</a><br/><br/>
    
    <table style="width: 100%; text-align:center; border: solid white; padding-right:20px; background-color:blanchedalmond;">
        <tr bgcolor='#cccccc'>
            <td style="text-align:center;">ID</td>
            <td style="text-align:center;">Birthday</td>
            <td style="text-align:center;">Name</td>
            <td style="text-align:center;">Created At</td>
			<td style="text-align:center;">Update</td>
        </tr>
        
        <?php
        while ( $res = mysqli_fetch_array($result)){
           echo "<tr>";
            echo "<td>".$res['ID']."</td>";
            echo "<td>".$res['birthday']."</td>";
            echo "<td align=justify>".$res['Name']."</td>";
            echo "<td>".$res['created_at']."</td>";
            echo "<td><a href=\"edit.php?ID=$res[ID]\">Edit</a> | <a href=\"delete.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure to delete this record?')\">Delete</a></td>"; 
            echo "</tr>";
        }
        ?>

    </table>

</body>
</html>