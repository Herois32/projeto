       <h6 class="border-bottom border-gray pb-2 mb-0">Quantitativo de Respostas</h6>
      </br>



<fieldset class="fieldset-border">
  <legend class="legend-border">RESUMO</legend>
  Total de chamados respondidos por cada usuário no periodo selecionado.
</fieldset>

  <div class="form-group col-md-8">
  <p> &#160; </p>
  </div>

<!--<form name="form_relatorio_admin" id="form_relatorio_admin" method="POST" onsubmit="return checarDatas()">-->
  <form action="<?php echo BASE_URL; ?>ajaxrelatoriomes/graficoAdmin" method="POST" name="form_relatorio" onsubmit="return checarDatas()">

<div class="form-row ">
<label> - Informe o Periodo:</label>

</div>

<br>

  <div class="form-row align-items-center">
    <div class="col-auto">
<label>Data Inicial:</label>
    </div>
    <div class="col-auto">
    <input type="text" name="dataInicio" class="form-control col-auto" id="dataInicio" onKeyPress="MascaraGenerica(this,'DATA');" placeholder="dd/mm/aaaa" maxlength="11" required>
    </div>


 <div class="form-group" style="margin:10px" >
  <p> &#160; </p>
  </div>



    <div class="col-auto">
<label>Data FInal:</label>
    </div>
 <div class="col-auto">
    <input type="text" name="dataFim" class="form-control col-auto" id="dataFim" onKeyPress="MascaraGenerica(this,'DATA');"placeholder="dd/mm/aaaa" maxlength="11" required>  
    </div>

    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
<div class="form-group col-md-8">
  <p></p>
  </div>
    </div>
  
</form>
</br>
<!--<div class="borda"></div>-->
 <?php if(empty($info)): ?>
 <?php echo $alert; ?>	
 <?php endif; ?>
<?php
if(!empty($info)):
  echo "<hr>";
echo '<h5>Total respondido no período entre '.$dataInicio.' e '.$dataFim.' </h5>';
  ?>

<br/>


<div id="table_div"></div>


</br>


  <div style="width:75%;">
    <canvas id="canvas"></canvas>
  </div>

</br>

<div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  
  <br/><br/>


    <script type="text/javascript" src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <script type="text/javascript">

//adiciona mascara de data

function MascaraData(data){

        if(mascaraInteiro(data)==false){

                event.returnValue = false;

        }       

        return formataCampo(data, '00/00/0000', event);

} 







  var MONTHS = [
        <?php foreach($info as $chave): ?>
           '<?php echo $chave['usr_nome']; ?>',
        <?php endforeach; ?>
  ];
    var config = {
      type: 'line',
      data: {
        labels: [
        <?php foreach($info as $chave): ?>
           '<?php echo $chave['usr_nome']; ?>',
        <?php endforeach; ?>
        ],
        datasets: [{
          label: 'Qtd de respostas',
          backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          data: [
        <?php foreach($info as $chave): ?>
           <?php echo $chave['totalResposta']; ?>,
        <?php endforeach; ?>
          ],
          fill: false,
        }]
      },
      options: {
        responsive: true,
        title: {
          display: true,
          text: 'Envolução de resposta de chamados'
        },
        tooltips: {
          mode: 'index',
          intersect: false,
        },
        hover: {
          mode: 'nearest',
          intersect: true
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Usuário Admin'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Quantidade'
            }
          }]
        }
      }
    };

    window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myLine = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
      config.data.datasets.forEach(function(dataset) {
        dataset.data = dataset.data.map(function() {
          return randomScalingFactor();
        });

      });

      window.myLine.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
      var colorName = colorNames[config.data.datasets.length % colorNames.length];
      var newColor = window.chartColors[colorName];
      var newDataset = {
        label: 'Dataset ' + config.data.datasets.length,
        backgroundColor: newColor,
        borderColor: newColor,
        data: [],
        fill: false
      };

      for (var index = 0; index < config.data.labels.length; ++index) {
        newDataset.data.push(randomScalingFactor());
      }

      config.data.datasets.push(newDataset);
      window.myLine.update();
    });

    document.getElementById('addData').addEventListener('click', function() {
      if (config.data.datasets.length > 0) {
        var month = MONTHS[config.data.labels.length % MONTHS.length];
        config.data.labels.push(month);

        config.data.datasets.forEach(function(dataset) {
          dataset.data.push(randomScalingFactor());
        });

        window.myLine.update();
      }
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
      config.data.datasets.splice(0, 1);
      window.myLine.update();
    });

    document.getElementById('removeData').addEventListener('click', function() {
      config.data.labels.splice(-1, 1); // remove the label first

      config.data.datasets.forEach(function(dataset) {
        dataset.data.pop();
      });

      window.myLine.update();
    });
    </script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
       <?php foreach($info as $chave): ?>
          ['<?php echo $chave['usr_nome']; ?>', <?php echo $chave['totalResposta']; ?>],
        <?php endforeach; ?>
        ]);

        var options = {
          title: 'Qtd por Usuário Admin',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>



    <script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Nome');
        data.addColumn('number', 'Quantidade');
        data.addColumn('boolean', '');
        data.addRows([
          <?php foreach($info as $chave): ?>
           ['<?php echo $chave['usr_nome']; ?>', <?php echo $chave['totalResposta']; ?>, true],
         <?php endforeach; ?>
        ]);

        var table = new google.visualization.Table(document.getElementById('table_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
    </script>




 <?php endif; ?> 


<div class="form-group col-md-12">
  <p class="border-bottom border-gray pb-2 mb-"> <a href="<?php echo BASE_URL; ?>chamados"><span class="btn btn-secondary" role="button" >Voltar</a></p>
  </div>


</div> 




</main>

</body>

</html>