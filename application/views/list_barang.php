<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Laporan Harian</h2>
<h3>Tanggal 24 Mei 2021</h3>

<table>
  <tr>
    <th>No</th>
    <th>Nama Barang</th>
    <th>Stok Barang</th>
  </tr>
  <tr>
  <?php $i = 1;
		foreach ($barang as $barangs) { ?>
			<tr>
				<td><?php echo $i++ ?></td>
				<td><?php echo $barangs->nama ?></td>
				<td><?php echo $barangs->jumlah ?></td>
			</tr>
<?php } ?>
    
  </tr>
</table>

</body>
</html>