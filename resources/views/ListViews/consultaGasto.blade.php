<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Ejido San Rafael Ixtapalucan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   @include('IncludeViews.cabeza')
</head>
<body>
    @include('IncludeViews.menu')
  
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-4">
          <h2>Consulta de Gastos</h2>
          <table class="table table-bordered table-striped">
            <thead class="table-dark">
              <tr>
                <th>Responsable</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Concepto</th>
                <th>Medida</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
        </div>
      </div>
      @include('IncludeViews.pie')
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
