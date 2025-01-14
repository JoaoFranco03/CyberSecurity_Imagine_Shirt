<!DOCTYPE html>
<html>
<head>
    <title>Fatura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
<h2>Fatura</h2>
<table>
    <thead>
    <tr>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Preço unitário</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Item 1</td>
        <td>2</td>
        <td>R$ 10,00</td>
        <td>R$ 20,00</td>
    </tr>
    <tr>
        <td>Item 2</td>
        <td>1</td>
        <td>R$ 5,00</td>
        <td>R$ 5,00</td>
    </tr>
    <tr>
        <td colspan="3" class="total">Total</td>
        <td class="total">R$ 25,00</td>
    </tr>
    </tbody>
</table>
</body>
</html>
