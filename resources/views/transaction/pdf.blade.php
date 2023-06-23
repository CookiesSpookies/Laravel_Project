<!DOCTYPE html>
<html>
<head>
	<title>Penjualan PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Penjualan</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Toko</th>
				<th>Nominal Transaksi</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($transactions as $transaction)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$transaction->kode_toko}}</td>
				<td>{{$transaction->nominal_transaksi}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
