@extends('admin.layouts.app')

@section('page','Panel administrativo')

@section('content')


           <div class="panel panel-container container shadow-sm">
          <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
              <div class="panel  panel-widget border-right">
                <div class="row no-padding"><i class="fas fa-eye"></i>
                  <div class="large">120</div>
                  <div class="dashboard-small">Visitantes</div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding ">
              <div class="panel panel-widget border-right">
                <div class="row no-padding"><i class="fas fa-file-upload"></i></em>
                  <div class="large">62</div>
                  <div class="dashboard-small">Archivos</div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
              <div class="panel  panel-widget border-right">
                <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                  <div class="large">13</div>
                  <div class="dashboard-small">Usuarios</div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 no-padding">
              <div class="panel  panel-widget ">
                <div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
                  <div class="large">2k</div>
                  <div class="dashboard-small">Páginas vistas</div>
                </div>
              </div>
            </div>
          </div><!--/.row-->
        </div>

        <div class="mt-5 row">
          <div class="col-md-6 mt-5" style="width: 200px; height: 200px;">
            <canvas id="line-chart" style="width: 200px; height: 200px;"></canvas>
          </div>
          <div class="col-md-6 mt-5">
            <canvas id="pie-chart" style="width: 200px;"></canvas>
          </div>
        </div>
            
            
        </div>
    </div>
@endsection
@section('scripts')

</script>

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		<script type="text/javascript">
			new Chart(document.getElementById("line-chart"), {
  type: 'horizontalBar',
  data: {
    labels: ["Usuario 1","Usuario 2","Usuario 3","Usuario 4","Usuario 5"],
    datasets: [{         
        label: [""],
        data: [2,3,4,5,6],
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Cuota de espacio utilizado en GB'
    }
  }
});
		</script>

		<script type="text/javascript">
			new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Imagenes", "Audios", "Videos", "Documentos"],
      datasets: [{
        label: "Navegadores utilizados por los usuarios",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [10,2,16,34]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Documentos almacenados en la plataforma'
      }
    }
});
		</script>
@endsection