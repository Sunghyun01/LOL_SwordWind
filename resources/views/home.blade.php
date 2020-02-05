<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>칼바람나락</title>
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<style>
			*{margin:0;padding: 0;}
			/* .modal{
				width:60%;
				height: 60%;
				display: none;
				position: absolute;
				top: 50%;
				right: 50%;
  				transform: translate(100%,-60%);
				z-index: 10
			} */
		</style>
	</head>
	<body>
		<div class="wrap">
			<table id="datatable" class="ui celled table" style="width:100%">
		        <thead>
		            <tr>
		                <th>이름</th>
		                <th>가하는 피해량</th>
		                <th>받는 피해량</th>
		            </tr>
		        </thead>
		    </table>
			<div class="modal"></div>
		</div>
	</body>
	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$(document).ready(function() {
			$('#datatable').DataTable( {
				"processing": true,
				"serverSide": true,
				"scrollY": $(window).height()-200,
				"scrollCollapse": true,
        		"paging": false,
				"fnDrawCallback" : datatableDrawed,
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
		function datatableDrawed(){
			$(document).on("click","#datatable [role=row]",function(){
				var id = $(this).attr('id');
				var response = $.ajax({
					url: '/champion/'+id,
					type: 'get',
					async: false
				});
				$(".modal").html(response.responseText)
				$(".modal").modal();
				$(".modal").css('max-width','none');
			})
		}
	</script>
</html>
