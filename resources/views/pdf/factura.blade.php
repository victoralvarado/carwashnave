<!DOCTYPE html>
<html>

<head>
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .factura-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .factura-header h1 {
            margin: 0;
        }

        .comercio-info {
            margin-bottom: 20px;
        }

        .info-label {
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot th {
            text-align: right;
        }

        .total-label {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="factura-header">
        <h1>Factura</h1>
    </div>
    <center>
    <div class="comercio-info">
        <p class="info-label">Comercio:</p>
        <p>Carwash La Nave</p>
        <p class="info-label">Dirección:</p>
        <p>Km. 11 Carretera a Santa Tecla.</p>
        <p class="info-label">Registro:</p>
        <p>000-000-0000-00</p>
        <p class="info-label">Cliente:</p>
        <p> {{ $cliente }}</p>

    </div>
    </center>
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
                <td>${{ $resultado->precio }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
    <th class="total-label">Total:</th>
    <td>${{ $total }}</td>
</tr>


        </tfoot>
    </table>
    <center>
    <p class="info-label">Gracias por visitarnos ¡vuelva pronto!</p>
    <p class="info-label">Dios les bendiga.</p>
    </center>
</body>

</html>
