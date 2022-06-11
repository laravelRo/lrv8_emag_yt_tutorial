<style>
    .container {
        margin: 20px auto;
        padding: 15px 10px;
        border: 1px grey solid;
        border-radius: 5px;
        max-width: 600px;
        overflow-wrap: break-word;
    }

    .container h1 {
        font-size: 1.7em;
        text-align: center;
        line-height: 2em;
    }

    .container h3 {
        font-size: 1.2em;
        text-align: left;
        line-height: 1.8em;
    }

    .container p {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 1em;
        line-height: 1.2em;
        color: rgb(41, 44, 46);
        margin: 10px 5px;

    }

    .container a.link {
        display: block;
        padding: 3px 6px;
        width: 80%;
        margin: 5px auto;
        text-align: center;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.4em;
        background-color: rgb(66, 56, 75);
        color: white;

    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
    }

    table tr,
    table td {
        padding: 5px;
    }
</style>

<div class="container">
    <h1>
        Comanda cu numarul {{ $order->id }} din {{ $order->created_at->format('d-M Y') }}
    </h1>
    <p>
        Statul comenzii: <b>
            @if ($order->approved_at)
                Comanda verificata si aprobata
            @endif
        </b> - <b>
            @if ($order->payed_at)
                Plata inregistrata
            @endif
        </b>
    </p>
    <p>
        {!! $alert !!}
    </p>
    <p>
        Datele comenzii sunt urmatoarele:<br>
        <b>Nume: </b> {{ $order->name }}&nbsp;
        <b>Oras: </b> {{ $order->city }}&nbsp;
        <b>Address: </b> {{ $order->address }}&nbsp;
        <b>Phone: </b> {{ $order->phone }}&nbsp;

    </p>
    <p>
        Total comanda: <b>{{ $order->totalCost() }}</b> din care transport <b>{{ $order->shipping_cost }}</b>
    </p>

    <h3>Produsele comenzii</h3>
    <table>
        <thead>
            <th>
                #
            </th>
            <th>
                Produs
            </th>
            <th>
                Pret
            </th>
            <th>
                Nr buc
            </th>
            <th>
                Cost
            </th>
        </thead>
        <tbody>
            @foreach ($order->order_items as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->qty * $item->price }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <p>Cost total produse <b>{{ $order->totalCost() - $order->shipping_cost }}</b></p>

    <a href="{{ route('account.orders.pdf', $order->id) }}">Descarca in forma pdf</a>

</div>
