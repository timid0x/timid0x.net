<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket de compra</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 10px;
            margin: 0%;
            padding: 0%;
        }

        .ticket {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
        }

        h1,
        h2,
        h3,
        h4 {
            text-align: center;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 10px;
        }

        .info div {
            margin-bottom: 5px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
        }

    </style>

</head>

<body>
    <div class="ticket">
        {{-- @dump($order) --}}
        <h4>
            Número de orden: {{ $order->id }}
        </h4>
        <div class="info">
            <h3>
                Información empresa
            </h3>
            <div>
                TIMID0x
            </div>
            <div>
                Panamá, Panamá
            </div>
            <div>
                email: timid0x.player@gmail.com
            </div>
        </div>

        <div class="info">
            <h3>
                Datos del cliente
            </h3>
          <div>
                Nombre
                {{ $order->address['receiver_info']['first_name'] . $order->address['receiver_info']['last_name'] }}
            </div>
            <div>
                Dirección {{ $order->address['description'] }} - {{ $order->address['district'] }} -
                {{ $order->address['reference'] }}
            </div>
            <div>
                Teléfono {{ $order->address['receiver_info']['phone'] }}
            </div> 

            <div class="footer">
                ¡Gracias por su compra!
            </div>

        </div>
    </div>
</body>

</html>
