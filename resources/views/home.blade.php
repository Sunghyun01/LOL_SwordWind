<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>칼바람나락</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		<div class="wrap">
			<table id="example" class="ui celled table" style="width:100%">
		        <thead>
		            <tr>
		                <th>이름</th>
		                <th>가하는 피해량</th>
		                <th>받는 피해량</th>
		            </tr>
		        </thead>
		    </table>
		</div>
	</body>
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		function callback(){

		}
		$(document).ready(function() {
			$('#example').DataTable( {
				"processing": true,
				"serverSide": true,
				"scrollY": $(window).height()-200,
				"scrollCollapse": true,
        		"paging": false,
				"fnDrawCallback" : callback(),
				"ajax": {
					"url": location.href,
					"type": "POST"
				},
				"columns": [
					{ "data": "name" },
					{ "data": "attack", "searchable": false },
					{ "data": "attacked", "searchable": false }
				]
			} );
		} );
	</script>
</html>
