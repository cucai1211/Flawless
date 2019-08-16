<?php
	$conn = mysqli_connect('localhost','root','','learning');
	if(mysqli_errno($conn)) {
		die();
	}

	$cmcount = 2;

	$sql = "select * from comments limit $cmcount";
	$result = mysqli_query($conn,$sql);
?>
<style type="text/css">
	.comment-box {width: 450px; border: 0.1em solid darkgrey; min-height: 80px; border-radius: 3px; padding: 0 20px;}
	#cm-button {background: #fff; border: 0.1em solid grey; border-radius: 3px; padding: 5px 10px; margin-top: 27px; cursor: pointer;}
	.wrapper {margin: 30px;}
</style>

<div class="wrapper">
<div class="comment-box" id="comments">

<?php
	if(mysqli_num_rows($result) > 0) {
		// echo "There are comments";
		while($row = mysqli_fetch_assoc($result)) {
			echo"<h3>".$row['author']."</h3>";
			echo "<p>".$row['comment']."<br>";
		}
	} else {
		echo "Add more comments!";
	}
?>

</div>
<div class="comment-box"  style="text-align: center;">
	<button id="cm-button">Show more</button>
</div>
</div>

<script type="text/javascript">
	document.getElementById('cm-button').addEventListener('click',showComment);

	function showComment() {
		var xhr = new XMLHttpRequest();
		var cmcount = <?=$cmcount?>+2;
		//open - function - send

		xhr.open('GET','dom.php?count='+cmcount,true);

		xhr.onload = function() {
			console.log(this.responseText);
			var cmt = document.getElementById('comments');
			cmt.innerHTML = this.responseText;
		}

		xhr.send();
	}
</script>