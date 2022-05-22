<!DOCTYPE html>
<html>

<head>
    <title>Print order {{ $order->id }}</title>
</head>

<style type="text/css">
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

<h1>Comanda din data {{ $order->created_at->format('d M Y') }} cu nr {{ $order->id }}</h1>

<h2>Cost total inclusiv transport: {{ number_format($order->totalCost(), '2', ',', '.') }}</h2>

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
<p>Transport: {{ $order->shipping_cost }} --- Cost Produse:
    {{ number_format($order->totalCost() - $order->shipping_cost, '2', ',', '.') }}
</p>

</html>
