<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Test</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
		}
	</style>
</head>

<body>
	<h1>Form Input</h1>

	<form action="tambah.php" method="post">
		<button type="submit">Proses Semua Histori</button>
	</form>

	<br />

	<h1>Histori</h1>

	<table>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total Belanja</th>
		</tr>
		<?php
		include "koneksi.php";
		$data = mysqli_query($host, "SELECT * FROM total_belanja");
		while ($item = mysqli_fetch_assoc($data)) {
		?>
			<tr>
				<td><?php echo $item['id'] ?></td>
				<td><?php echo $item['nama_pelanggan'] ?></td>
				<td><?php echo $item['tanggal'] ?></td>
				<td><?php echo $item['total_belanja'] ?></td>
			</tr>
		<?php
		}
		?>

	</table>
</body>

</html>