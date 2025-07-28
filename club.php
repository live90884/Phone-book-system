<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body style="margin: 100px;">
    <h1>member</h1>
    <br>
    <table class="table">
        <thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Sex</th>
				<th>Email</th>
				<th>TEL</th>
				<th>Action</th>
			</tr>
		</thead>

        <tbody>
            <?php
			session_start();  //varibles we need is store in session
			$username=$_SESSION["username"];
			echo "<h1>Hi there ".$username."</h1>";
			echo "<a href='logout.php'>log out</a>";
            include "connect.php";
            // read all row from database table
			$sql = "SELECT * FROM member";
			$result = $connection->query($sql);

            if (!$result) {
				die("Invalid query: " . $connection->error);
			}

            // read data of each row
			while($row = $result->fetch_assoc()) {
				$id = $row['ID'];
			?>
				<tr>  
					<td><?php echo $id ?> </td>
                    <td><?php echo $row['name'] ?> </td>
                    <td><?php echo $row['sex'] ?> </td>
                    <td><?php echo $row['email'] ?> </td>
                    <td><?php echo $row['TEL'] ?> </td>
                    <td>
					<form name="form" action="/delete.php" method="get">
						  <input type='hidden' name='ID' value='<?php echo $row['ID'] ?>'>
						  <input type="submit" class='btn btn-danger btn-sm' value="delete">  
					</form>
					<br>
					<form name="form" action="/update.php" method="get">
						<input type='hidden' name='ID' value='<?php echo $row['ID'] ?>'>
						<input type="submit" class='btn btn-primary btn-sm' name="update_btn" value="update">
					</form>
					</td>
					</td>

                </tr>
				
				<?php
            }
			
            $connection->close();
            ?>
        </tbody>
    </table>
	<form style="text-align:center;" method="POST" name="addUser" action="/database.php" >
		<div class="form-group">
		<label for="name">Name</label>
		<input type="name" class="form-control" name="name" placeholder="Enter name">
		</div>
		<hr>
			<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="Options" id="Radio1" value="0">
			<label class="form-check-label" for="inlineRadio1">male</label>
			</div>
				<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="Options" id="Radio2" value="1">
				<label class="form-check-label" for="inlineRadio2">female</label>
				</div>
					<div class="form-group">
					<label for="exampleInputEmail1">Email address</label>
					<input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
					<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
						<div class="form-group">
						<label for="name">TEl number</label>
						<input type="tel" class="form-control" name="tel" placeholder="Enter TEL number">
						</div>
		<br>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>