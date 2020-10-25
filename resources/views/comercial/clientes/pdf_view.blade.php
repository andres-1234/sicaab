<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <th>NIT</th>
        <th>BUSINESS NAME</th>
        <th>DIRECTIÓN</th>
        <th>PHONE</th>
        <th>E-MAIL</th>
        <th>CONTACT PERSON</th>
        <th>CITY</th>
      </tr>
      </thead>
    @foreach($clientes as $cli)
        <tbody>
            <tr class="text-center">
                <td>{{ $cli->nit}}</td>
                <td>{{ $cli->razon_social}}</td>
                <td>{{ $cli->direccion}}</td>
                <td>{{ $cli->telefono}}</td>
                <td>{{ $cli->correo}}</td>
                <td>{{ $cli->persona_contacto}}</td>
                <td>{{ $cli->ciudad}}</td>
            </tr>
        </tbody>
    @endforeach
    </table>
  </body>
</html>