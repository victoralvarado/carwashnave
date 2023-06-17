<!DOCTYPE html>
<html>

<head>
    <title>Factura</title>
</head>

<body>
    <h1>Factura</h1>

<p>Cliente: {{ $cliente }}</p>

<table>
  <thead>
    <tr>
      <th>Servicio</th>
      <th>Precio</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($servicios as $resultado)
      <tr>
        <td>{{ $resultado->descripcion_servicio }}</td>
        <td>{{ $resultado->precio }}</td>
      </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <th>Total:</th>
      <td>{{ $total }}</td>
    </tr>
  </tfoot>
</table>

</body>

</html>
