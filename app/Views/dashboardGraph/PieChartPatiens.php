<!--  Row for pie chart -->

<div class="row">

    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= lang("dashboard.tenMostFrequentPatients") ?> </h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
            </div>

        </div>

    </div>


    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= lang("dashboard.tenMostFrequentDiagnoses") ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="donutChartDiagnoses" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 764px;" width="764" height="250" class="chartjs-render-monitor"></canvas>
            </div>

        </div>

    </div>



</div>


<?= $this->section('js') ?>




<script src=https://adminlte.io/themes/v3/plugins/chart.js/Chart.min.js"></script>

<script>


    var pieChart;

    function pieCharts(tag, data, color,control) {



        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.


        //console.log(etiqueta);

        var donutChartCanvas = control.get(0).getContext('2d');

        var donutData = {
            labels: tag,
            datasets: [
                {
                    data: data,
                    backgroundColor: color,
                }
            ]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        pieChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })


    }
    $(document).ready(function () {
        
        
        
        <?php
     
        echo " pieCharts([". ($dataPatiens['name'])."],[" . ($dataPatiens['amount'])."],[". ($dataPatiens['color'])."],$('#donutChart'));";
        echo " pieCharts([". ($dataDiagnoses['description'])."],[" . ($dataDiagnoses['amount'])."],[". ($dataDiagnoses['color'])."],$('#donutChartDiagnoses'));";
        ?>

    })


</script>




<?= $this->endSection() ?>