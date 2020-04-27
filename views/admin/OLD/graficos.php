       <h6 class="border-bottom border-gray pb-2 mb-0">Relatório Gráfico</h6>
      </br>
  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  </style>
<fieldset class="fieldset-border">
  <legend class="legend-border">RESUMO</legend>
 Gráfico que apresenta o percentual de Chamados por Status e Percentual de Chamados por Empresa onde mostra quem tem o maior volume de chamados
</fieldset>



 <div class="form-group col-md-8">
  <p> &#160; </p>
  </div>

<form action="<?php echo BASE_URL; ?>graficos/buscarStatus" name="form_grafico" method="POST">
 
<div class="form-row ">
<label> - Informe o Periodo:</label>

</div>

<br>

  <div class="form-row align-items-center">
    <div class="col-auto" width="30%">
<label>Data Inicial:</label>
    </div>
    <div class="col-auto">
    <input type="text" name="dataInicio" class="form-control col-auto" id="dataInicio" onKeyPress="MascaraGenerica(this,'DATAMES');" placeholder="mm/aaaa" maxlength="7" required>
    </div>


 <div class="form-group" style="margin:10px" >
  <p> &#160; </p>
  </div>


    <div class="col-auto" width="30%" >
<label>Data FInal:</label>
    </div>
 <div class="col-auto">
    <input type="text" name="dataFim" class="form-control col-auto" id="dataFim" onKeyPress="MascaraGenerica(this,'DATAMES');" placeholder="mm/aaaa" maxlength="7" required>  
    </div>

    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
<div class="form-group col-md-8">
  <p></p>
  </div>
    </div>
  
</form>

<?php 
if(!empty($dados)):
echo '<h5>Total de chamados no período entre - '.$dataInicio.' e '.$dataFim.'</h5>';
?>

       <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
 
</table>
</br>

 <div id="top_x_div" style="width: 800px; height: 600px;"></div>

</main>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript"></script>

<script type="text/javascript">
    // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
       data.addRows([

        <?php foreach($dados as $chave): ?>
          ['<?php echo $chave['ch_status']; ?>', <?php echo $chave['total']; ?>],
        <?php endforeach; ?>
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Total de chamados por Status',
                       width:500,
                       height:400};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
        <?php foreach($dadosEmpresa as $key): ?>
          ['<?php echo $key['ep_razao_social']; ?>', <?php echo $key['total']; ?>],
        <?php endforeach; ?>
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Total de empresa por Empresas',
                       width:500,
                       height:400};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
  </script>


     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Quantidade'],

        <?php foreach($dadosMeses as $chave): ?>
          ["<?php echo $chave['data_result']; ?>", <?php echo $chave['total']; ?>],
        <?php endforeach; ?>
        ]);

        var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Tatalidade de Chamados',
            subtitle: 'Período informado' },
          axes: {
            x: {
              0: { side: 'top', label: 'Gráfico - Total de chamados'} // Top x-axis.
            }
          },
          bar: { groupWidth: "20%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>



<?php endif; ?>

<?php if(empty($dados)): ?>

<div class="alert alert-warning" role="alert">
  Nenhum dado encontrado!
</div>
 <?php endif; ?> 


</body>

</html>