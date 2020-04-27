      <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">


  <style>
  canvas {
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  </style>


            <div class="col-xl-8 col-lg-7">
               
              <form action="<?php echo BASE_URL; ?>relatorios/graficos" method="POST">
         
            <div class="form-inline">
              <div class="" align="right" width="1000">
                <label>Selecione Mês e Ano:</label>
              </div> 
              <div class="" style="padding: 10px">
                <input  type="month" name="data" class="form-control"  style="width:220px" maxlength="15" >
              </div> 
              <div class="" >
                <button type="submit" class="btn btn-primary">Pesquisar</button>
              </div>  
          </div>

              </form>

<div class="form-row ">
&#160;&#160;&#160;&#160;&#160;&#160;  
</div>



              <div class="form-group">
             
              <!-- Area Chart -->
              <div class="card shadow mb-10">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Mês corrente: <?php echo $data; ?></h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
              <div id="donutchart" style="width: 700px; height: 300px;"></div>
                  </div>
                  <hr>
                  Percentual de alunos com maior numero de comentários.
                </div>
              </div>

              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Mês corrente: <?php echo $data; ?></h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <div id="columnchart_values" style="width: 500px; height: 300px;"></div>
                  </div>
                  <hr>
                  Quantidade de acessos ao portal por usuário.
                </div>
              </div>

            </div>



              <!-- Bar Chart -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Mês corrente: <?php echo $data; ?></h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                   <div id="piechart_3d" style="width: 650px; height: 300px;"></div>
                  </div>
                  <hr>
                  Percentual de acesso ao Portal por aluno.
                </div>
              </div>

            </div>


        </div>
        <!-- /.container-fluid -->

 <!-- /.container-fluid -->


 <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
 <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
        <?php foreach($coment as $dados): ?>
        ['<?php echo $dados['cm_nome']; ?>', <?php echo $dados['qtd']; ?>, ],
        <?php endforeach; ?>
        ]);

        var options = {
          title: 'Porcentagem de comentários por Alunos',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        <?php foreach($qtd as $key): ?>
        ['<?php echo $key['usr_nome']; ?>', <?php echo $key['usr_logado']; ?>, randomScalingFactor()],
        <?php endforeach; ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Quantidade de Acessos",
        width: 600,
        height: 320,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Task', 'Hours per Day'],
          <?php foreach($qtd as $chave): ?>
          ['<?php echo $chave['usr_nome']; ?>', <?php echo $chave['usr_logado']; ?>],
          <?php endforeach; ?>
        ]);

        var options = {
          title: 'Quantidade de acessos por alunos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>