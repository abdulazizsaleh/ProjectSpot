<?php

include './system/init.php';

if($_GET['keyword'] && !empty($_GET['keyword']))
    {
		$keyword = $_GET['keyword'];
        $keyword="%$keyword%";
		$query = "select username from account where username like ?";
        $statement = $db->prepare($query);
        $statement->bind_param('s',$keyword); // we use s here to let it know that it is going to be a string to bind the string 
        $statement->execute();
        $statement->store_result();
		
		$keyword2="%$keyword%";
		$query2 = "select frist_name from account where frist_name like ?";
        $statement2 = $db->prepare($query2);
        $statement2->bind_param('s',$keyword2); // we use s here to let it know that it is going to be a string to bind the string 
        $statement2->execute();
        $statement2->store_result();
		
		
		if($statement->num_rows() == 0) // if there are no records fetched. 
        {
            echo " nothing result found ";
            $statement->close();
            $db->close();
 
        }
		else {
			
            $statement->bind_result($name);
            while ($statement->fetch()) // loop thro the whole records and display the matches
            {
				echo "<br>";
                echo "<h5>The user name you searched for is : $name</h5>";
            };
            
			 $statement2->bind_result($name);
            while ($statement2->fetch()) // loop thro the whole records and display the matches
            {
				echo "<br>";
                echo "<h5>the name you searched for is : $name</h5>";
            };
            $statement->close();
            $db->close();
        }
		
	}



?>
<!DOCTYPE html>
<html>
<body>


<body>
<head>

