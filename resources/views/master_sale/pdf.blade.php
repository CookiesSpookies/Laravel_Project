<!DOCTYPE html>
<html>
<head>
	<title>Master Sales PDF</title>
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
		<h5>Master Sales</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Sales</th>
				<th>Nama Sales</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($master_sales as $master_sale)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$master_sale->kode_sales}}</td>
				<td>{{$master_sale->nama_sales}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
