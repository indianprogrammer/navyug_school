

	<form method="post" id="import_form" enctype="multipart/form-data">
			<p><label>Select Excel File</label>
			<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
			<br />
			<input type="submit" name="import" value="Import" class="btn btn-info" />
		</form>
		<script type="text/javascript">
			$(document).ready(function(){
			$('#import_form').on('submit', function(event){
			event.preventDefault();
			$.ajax({
			url:"<?= base_url(); ?>student/import_data",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			 processData:false,
			success:function(data){
				$('#file').val('');
				
				alert(data);
			}
		})
	});
		});
		</script>
	
