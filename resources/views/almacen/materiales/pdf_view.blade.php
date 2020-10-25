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
        <th>MATERIAL NAME</th>
        <th>UNIT OF MEASUREMENT</th>
        <th>CATEGORY</th>
        <th>OPTIONS</th>
      </tr>
      </thead>
    @foreach($material as $mat)
        <tbody>
            <tr class="text-center">
                <td>{{ $mat->nombre_material}}</td>
                    <td>{{ $mat->unidad_medida}}</td>
                    <td>{{ $mat->categoria}}</td>
            </tr>
        </tbody>
    @endforeach
    </table>
  </body>
</html>