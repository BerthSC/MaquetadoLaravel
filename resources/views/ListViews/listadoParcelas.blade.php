<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado de Parcelas - Ejido San Rafael Ixtapalucan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   @include('IncludeViews.cabeza')
</head>
<body>
    @include('IncludeViews.menu')

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-10 p-4">
          <h2>Listado de Parcelas</h2>
          <table class="table table-bordered table-striped align-middle">
            <thead>
              <tr>
                <th>No. Parcela</th>
                <th>Superficie</th>
                <th>Uso de Suelo</th>
                <th>Ubicación</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>

        

<div class="col-md-10 p-4">
  <h2>Listado de Colindancia</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Norte</th>
        <th>Sur</th>
        <th>Este</th>
        <th>Oeste</th>
        <th>Noreste</th>
        <th>Sureste</th>
        <th>Noroeste</th>
        <th>Suroeste</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
  </table>
</div>

              

        <!-- Contenido coordenada -->
        <div class="col-md-10 p-4">
          <h2>Listado de Coordenadas</h2>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Punto</th>
                <th>Coordenada en X</th>
                <th>Coordenada en Y</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>

        <!-- Contenido INFADMIN -->
        <div class="col-md-10 p-4">
          <h2>Listado de Información Administrativa</h2>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Número de Inscripción RAN</th>
                <th>Clave de Núcleo Agrario</th>
                <th>Comunidad</th>
                <th>Fecha de Expedición</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
      @include('IncludeViews.pie')
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
