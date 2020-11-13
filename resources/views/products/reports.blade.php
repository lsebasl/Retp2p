@extends('layout.app')
@section('content')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <div class="">
    <canvas id="myChart" width="400" height="400"></canvas>
    <script>

    var products=[];
    var values=[];

    $(document).ready(function(){

    var products =[]
    var values = []

    $.ajax{
       url:'report/product/all',
       method:'POST',
       data: {
            id:1
            _token:$('input[name="_toke"]'),val()
       }.done(function(res){
        var arreglo = JSON.parce(res);
    alert(res);
});

    for(var x=0;x<arreglo.lenght;x++{
        var todo='<tr><td>'+arreglo[x].id+'</td>;
        todo+='<td>'+arreglo[x].barcode+'</td>;
        todo+='<td>'+arreglo[x].name+'</td>;
        todo+='<td>'+arreglo[x].price+'</td>;
        $('#tbody').append(todo);
        products.push(arreglo[x].name);
        products.push(arreglo[x].stock);
    }

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [products],
        datasets: [{
            label: 'Stocks Products',
            data: [values],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
    </div>

@endsection

