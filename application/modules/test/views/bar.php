<canvas id="myChart" width="400" height="200"></canvas>
<script>
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
						ids.push(obj[i].ids);
						debit.push(obj[i].debit);

					}
					console.log(ids);
					console.log(debit);
var canvas = document.getElementById('myChart');
var data = {
    labels: ids,
    datasets: [
        {
            label: "My First dataset",
            backgroundColor: "rgba(255,99,132,0.2)",
            borderColor: "rgba(255,99,132,1)",
            borderWidth: 4,
            // xAxisID:"10",
            hoverBackgroundColor: "rgba(255,99,132,0.4)",
            hoverBorderColor: "rgba(255,99,132,1)",
            data: debit,
            backgroundColor:[
            "red","yellow","green","black","pink"
            ]
        }
    ]
};
var option = {
animation: {
				duration:5000
}

};


var myBarChart = Chart.Bar(canvas,{
	data:data,
  options:option
});
}
});
});
</script>


