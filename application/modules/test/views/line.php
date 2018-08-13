
<canvas id="myChart" width="400" height="250"></canvas>

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



var canvas = document.getElementById('myChart');
var data = {
    labels: ids,
    datasets: [
        {
            label: "My First line graph",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            pointHitRadius: 10,
            data: debit,
            
        }
    ]
};

var option = {
	showLines: true
};
var myLineChart = Chart.Line(canvas,{
	data:data,
  options:option
});
}
});
    });
</script>option