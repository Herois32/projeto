	<style>

	canvas {

		-moz-user-select: none;

		-webkit-user-select: none;

		-ms-user-select: none;

	}

	</style>





<form name="form_relatorio_comparativo" id="form_relatorio_comparativo" method="POST">

<div class="form-row ">
&#160;&#160;&#160;&#160;&#160;&#160;	
<label>Informe o Período:</label>

</div>

<br>
 <div class="form-inline"> 
  <div class="form-row align-items-center">
&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;&#160;
    <div class="col-auto" width="30%">
<label>Mês Inicial:</label>
    </div>
    <div class="col-auto">
    <input type="month" name="dataInicio" class="form-control col-auto" id="dataInicio" style="width:220px" placeholder="mm/aaaa" maxlength="7" required>
    </div>


 <div class="form-group" style="margin:10px">
  <p> &#160; </p>
  </div>


    <div class="col-auto" width="30%" >
<label>Mês Final:</label>
    </div>
 <div class="col-auto">
    <input type="month" name="dataFim" class="form-control col-auto" id="dataFim" style="width:220px" placeholder="mm/aaaa" maxlength="7" required>  
    </div>

    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Consultar</button>
    </div>
<div class="form-group col-md-8">
  <p></p>
  </div>
    </div>
     </div>
  
</form>




</br></br>

 <?php echo (!empty($alert) ? $alert : ''); ?> 


 

 <?php if(!empty($dataInicial)): ?>

	<div id="canvas-holder" style="width:50%" >
		<div align="center">
		<?php echo "Acesso realizado no perído entre ".$dataInicial." e ".$dataFim;  ?>
		</div>
		<canvas id="chart-area"></canvas>

	</div>

 <?php endif; ?> 



<script type="text/javascript" src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>

<script type="text/javascript" src="https://www.chartjs.org/samples/latest/utils.js"></script>



<script>

		var randomScalingFactor = function() {

			return Math.round(Math.random() * 100);

		};



		var config = {

			type: 'pie',

			data: {

				datasets: [{

					data: [

				 <?php foreach($info as $key): ?>

		        [<?php echo $key['usr_logado']; ?>, ],

		        <?php endforeach; ?>

					],

					backgroundColor: [

						window.chartColors.red,

						window.chartColors.orange,

						window.chartColors.yellow,

						window.chartColors.green,

						window.chartColors.blue,

					],

					label: 'Dataset 1'

				}],

				labels: [

				<?php foreach($info as $key): ?>

		        ['<?php echo $key['usr_nome']; ?>', ],

		        <?php endforeach; ?>

				]

			},

			options: {

				responsive: true

			}

		};



		window.onload = function() {

			var ctx = document.getElementById('chart-area').getContext('2d');

			window.myPie = new Chart(ctx, config);

		};



		document.getElementById('randomizeData').addEventListener('click', function() {

			config.data.datasets.forEach(function(dataset) {

				dataset.data = dataset.data.map(function() {

					return randomScalingFactor();

				});

			});



			window.myPie.update();

		});



		var colorNames = Object.keys(window.chartColors);

		document.getElementById('addDataset').addEventListener('click', function() {

			var newDataset = {

				backgroundColor: [],

				data: [],

				label: 'New dataset ' + config.data.datasets.length,

			};



			for (var index = 0; index < config.data.labels.length; ++index) {

				newDataset.data.push(randomScalingFactor());



				var colorName = colorNames[index % colorNames.length];

				var newColor = window.chartColors[colorName];

				newDataset.backgroundColor.push(newColor);

			}



			config.data.datasets.push(newDataset);

			window.myPie.update();

		});



		document.getElementById('removeDataset').addEventListener('click', function() {

			config.data.datasets.splice(0, 1);

			window.myPie.update();

		});

	</script>

	