<!DOCTYPE html>
<html>
<head>
	<title>Area Sale PDF</title>
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
		<h5>Area Sale Kode Toko</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Kode Toko</th>
				<th>Area Sales</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($area_sales as $area_sale)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$area_sale->kode_toko}}</td>
				<td>{{$area_sale->area_sale}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
