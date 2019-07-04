<?php include("server.php"); ?>
<?php $result = mysqli_query($db, "SELECT * FROM user"); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user WHERE id=$id");

		if (count(array($record)) == 1 ) {
			$n = mysqli_fetch_array($record);
			$nama = $n['nama'];
			$kota = $n['kota'];
		}
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Learn PHP7 | Simple-CRUD single page</title>
	<style>
		table, th, td {
			border: solid 1px #000;
			text-align: left;
		}
	</style>
</head>
<body>

	<!-- Alert jika CRUD data -->
	<?php if (isset($_SESSION['alert'])) : ?>
	<h2>
		<?php
			echo $_SESSION['alert'];
			unset($_SESSION['alert']);
		?>
	</h2>
	<?php endif ?>

	<!-- Form CRUD data -->
	<form action="server.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="text" name="nama" placeholder="Masukan Nama" value="<?php echo $nama; ?>">
		<input type="text" name="kota" placeholder="Masukan Kota" value="<?php echo $kota; ?>">
		<?php if ($update == true): ?>
		<input type="submit" name="update" value="Update">
		<?php else: ?>
		<input type="submit" name="save" value="Save">
		<?php endif ?>
	</form>

	<!-- Table data -->
	<table>
		<thead>
			<th>Nama</th>
			<th>Kota</th>
			<th colspan="2">Setting</th>
		</thead>
		<?php while ($row = mysqli_fetch_array($result)) { ?>
		<tr>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['kota']; ?></td>
			<td><a href="index.php?edit=<?php echo $row['id'] ?>">Edit</a></td>
			<td><a href="server.php?del=<?php echo $row['id'] ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

</body>
</html>