<div id="chart_container">
<canvas id="myCanvas">
</canvas>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
				url:"<?= base_url() ?>test/graph",
				method:"post",
				success:function(data){
					 console.log(data);
					var obj=JSON.parse(data);
					console.log(obj[0].ids);
					var ids=[];
					var debit =[];
					for (var i in obj)
					{
						ids.push("ids"+obj[i].ids);
						debit.push("debit"+obj[i].debit);

					}
					var chartdata={
						labels:ids,
						datasets:[
						{
							label:'ids debit',
							backgroundColor: 'rgba(200,200,200,.75)',
							borderColor:'rgba(200,200,200,0.75)',
							hoverBackgroundColor:'rgba(200,200,200,1)',
							hoverBorderColor:'rgba(200,200,200,1)',
							data:debit
						}
						]
					};
					var ctx=$('#myCanvas');
					var barGraph=new Chart(ctx,{
						tyoe:'bar',
						data:chartdata
					});




				},
				error:function(data){
					console.log(data);
				}

		});

	});
</script>