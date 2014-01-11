<html>
	<head>
		<title>Calendar</title>
	</head>
		<div class = "span">
			<div >
	<center>
	<h1>CALENDAR</h1>
	<style type="text/css">
		body, select{font-size: 20px;}
	</style>
	<body>
		Year:
		<select id = "year">
			<?php 
				for ($i=1990; $i <= 2014 ; $i++) { 
					echo '<option value = '.$i.'>';
					echo $i;
					echo '</option>';
				}
			 ?>
		</select>

		Month:
		<select id = "month">
			<option value = "jan">January</option>
			<option value = "feb">February</option>
			<option value = "mar">March</option>
			<option value = "apr">April</option>
			<option value = "may">May</option>
			<option value = "jun">June</option>
			<option value = "jul">July</option>
			<option value = "aug">August</option>
			<option value = "sept">September</option>
			<option value = "oct">October</option>
			<option value = "nov">Novmeber</option>
			<option value = "dec">December</option>
		</select>
		Day:
		<select id = 'day'>
			<?php 
			for ($i=1; $i <= 31; $i++) { 
				echo '<option value = '.$i.'>';
				echo $i;
				echo '</option>';
			}
			 ?>
		</select>
		</center>
		</div>
		</div>

	</body>
	<script type="text/javascript" src="jquery.1.10.2.js"></script>
	<script type="text/javascript">
			$(document).ready(function(){
		var month = $('#month').val();
		var year = $('#year').val();
		$('#year').on('change', function() {
			year = $('#year').val();
			$.ajax({
				url: 'JQ.php',
				data: {year: year},
				dataType: 'JSON',
				method: 'GET',
				success: function(response) {
					var day = response.day;
					var str = '';
					for (i = 1; i <= day; i++) {
						str += '<option value="' + i +'">';
						str += i;
						str += '</option>';
					}
					$('#day').html(str);
					
				}
			});
		});
		
		$('#month').on('change', function() {
			month = $('#month').val();
			$.ajax({
				url: 'JQ.php',
				data: {year: year, month: month},
				dataType: 'JSON',
				method: 'GET',
				success: function(response) {
					var day = response.day;
					var str = '';
					for (i = 1; i <= day; i++) {
						str += '<option value="' + i +'">';
						str += i;
						str += '</option>';
					}
					$('#day').html(str);
					
				}
			});
		});

	});

	</script>
</html>