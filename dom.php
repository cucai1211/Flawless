<?php
	// echo $_GET['count'];
	$cmcount = $_GET['count'];
	$conn = mysqli_connect('localhost','root','','learning');

	$sql = "select * from comments limit $cmcount";
	$result = mysqli_query($conn,$sql);
	// echo $cmcount;

	while($row = mysqli_fetch_assoc($result)) {
		echo"<h3>".$row['author']."</h3>";
		echo "<p>".$row['comment']."<br>";
	}
?>