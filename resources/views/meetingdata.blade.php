<!DOCTYPE html>
<html>
<head>
	<title>Meeting Data</title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=Western (ISO-8895-1)" />
	<link rel="stylesheet" type="text/css" href="css/frontend.css">
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
	<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<style>
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
			-webkit-appearance: none; 
			margin: 0; 
		}

		#myform .error
		{
			color: red;
		}

	</style>

</head>
<body>
	@if (session('message'))
	<div id = "success"  class="alert alert-success alert-white alert-dismissible fade show" role="alert">
		{{ session('message') }}
	</div>
	@endif

	<form action="adddata" id = "myform" method = "post">
		@csrf
		Employee Name:- <select name = "emp_name" id="sourabh" class="form-control select2" >
			<option value = ''>Employee Name</option>
			<option value = "A">A</option>
			<option value = "B">B</option>
			<option value = "C">C</option>
			<option value = "D">D</option>
			<option value = "E">E</option>
		</select><br><br>
		
		Meeting Date:- <input type="date" name="date" value = "{{old('date')}}" ><br><br>
		Meeting Time:- <input type="time" name="time" value = "{{old('time')}}" ><br><br>
		Meeting Hours <sup><font color="red">(only digits)</font></sup>:- <input type="number" name="meeting_hours" value = "{{old('meeting_hours')}}" ><br><br>
		Purpose of Meeting:- <textarea name = "purpose_of_meeting" value = "{{old('purpose_of_meeting')}}" ></textarea><br><br>

		Projector:- <input type="radio" name="projector" value = "Yes" >YES
		<input type="radio" name="projector" value = "No">NO<br><br>

		Audience Strength <sup><font color="red">(Only digits)</font></sup>:- <input type="number" name="audience_strength" value = "{{old('audience_strength')}}" ><br><br>

		<input type="submit" id = "button" value="submit">



	</form>
	<H3>All Available Data</H3>

	<table border = "1" id = "datatable-editable" class="table table-striped m-b-0">
		<tr>
			<th>Employee Name</th>
			<th>Meeting Date</th>
			<th>Meeting Time</th>
			<th>Meeting Hours</th>
			<th>Purpose of Meeting</th>
			<th>Projector</th>
			<th>Audience Strength</th>
		</tr>

		@foreach($data as $d)

		<tr>
			<td>{{$d->name}}</td>
			<td>{{$d->date}}</td>
			<td>{{$d->time}}</td>
			<td>{{$d->meeting_hours}}</td>
			<td>{{$d->purpose_of_meeting}}</td>
			<td>{{$d->projector}}</td>
			<td>{{$d->audience_strength}}</td>
		</tr>
		@endforeach
	</table>
</body>

<script type="text/javascript">
	$(document).ready(function(){
		
		$(function(){
			$('#datatable-editable').DataTable();
		});

		var error = $("#myform").validate({
			rules:
			{
				emp_name:
				{
					required: true
				},

				date:
				{
					required: true
				},

				time:
				{
					required: true
				},

				meeting_hours:
				{
					required: true,
					digits: true,
					minlength: 1,
					maxlength: 3
				},

				purpose_of_meeting:
				{
					required: true
				},

				projector:
				{
					required: true
				},

				audience_strength:
				{
					required: true,
					digits: true,
					minlength: 1,
					maxlength: 3
				}
			},

			messages:
			{
				emp_name:
				{
					required: 'Please add name'
				},

				date:
				{
					required: 'Please select date'
				},

				time:
				{
					required: 'Please select time'
				},

				meeting_hours:
				{
					required: 'Please add meeting_hours'
				},

				purpose_of_meeting:
				{
					required: 'Please add purpose_of_meeting'
				},

				projector:
				{
					required: 'Please give projector Availability'
				},

				audience_strength:
				{
					required: 'Please provide audience_strength'
				}
			},
		});
	});


			/*var a = document.getElementById('sourabh').value;

			alert(a);
			*/
		</script>
		</html>