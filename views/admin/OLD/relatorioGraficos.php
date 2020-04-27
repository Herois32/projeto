       <h6 class="border-bottom border-gray pb-2 mb-0">Relatório Quantitativo Dias</h6>
      <?php
       $chamadosAndamento = array(10,20,30,40,20);
       $chamadosFechados = array(8,30,50,60,20);
       ?>
      </br>

<form action="<?php echo BASE_URL; ?>relatorios" method="POST">
  <div class="form-row align-items-center">
  	<div class="col-auto">
<label>Selecione a categoria</label>
    </div>
    <div class="col-auto" style="width: 25%">
      <select class="form-control" name="categoria">
  	  <option>Selecione...</option>
  	  <?php foreach($catego as $key): ?> 
  	  <option value="<?php echo $key['cg_categoria']; ?>"><?php echo $key['cg_categoria']; ?></option>
  	  <?php endforeach; ?>
	  </select>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Consultar</button>
    </div>
  </div>
</form>

<?php 
if(empty($info)):
echo "SEM RESULTADO";
exit;
?>
<?php endif; ?>
<?php 
if(!empty($info)):
$array = array();

foreach($info as $key): 
$array[] = $key['total'];

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Nº Chamado</th>
      <th scope="col">Categoria</th>
      <th scope="col">Empresa</th>
      <th scope="col">Total de dias</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $key['ch_id']; ?></th>
      <td><?php echo $key['cg_categoria']; ?></td>
      <td><?php echo $key['ep_razao_social']; ?></td>
      <td><?php echo $key['total']; ?></td>
    </tr>
  </tbody>
</table>
 <?php endforeach; ?>
 <?php endif; ?> 
  
  <br/><br/>
<!--	<div style="width:75%;">
		<canvas id="canvas"></canvas>
  </div> -->
</div> 
</main>

 <script src="<?php echo BASE_URL; ?>assets/js/Chart.min.js"></script>
  <script src="<?php echo BASE_URL; ?>assets/js/utils.js"></script>
   
 
	/*	var MONTHS = ['janeiro', 'Fevereiro', 'Março', 'Abril', 'Mai', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
		var config = {
			type: 'line',
			data: {
				labels: ['janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
				datasets: [{
					label: 'Quantidade de Dias',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [<?php echo implode(',', $array); ?>

					],
					fill: false,
				}, {
					label: 'Chamados Fechados',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [<?php echo implode(',', $array); ?>
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Gráfico dos Chamados'
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
							labelString: 'Meses'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Valores'
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




/*    window.onload = function(){
        var contexto = document.getElementById('grafico').getContext('2d');
        var grafico = new Chart (contexto, {
          type:'line',
          data:{
            labels:['janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Dezembro'],
            datasets:[{
              label:'Chamados Em Andamento',
              backgroundColor:'#FF0000',
              boderColor:'#FF0000',
              data:[<?php echo implode(',', $chamadosAndamento); ?>],
              fill:false
            },{
              label:'Chamados Fechados',
              backgroundColor:'#000000',
              boderColor:'#000000',
              data:[<?php echo implode(',', $chamadosFechados); ?>],
              fill:false

            }]

          }
    
        });

      }*/
</script>

</body>

</html>