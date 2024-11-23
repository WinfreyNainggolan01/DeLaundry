<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data from Hapi.js API</title>
</head>
<body>
    <h1>Data from Hapi.js API</h1>

    @if(isset($error))
        <p style="color: red;">{{ $error }}</p>
    @elseif(isset($data))
        <p><strong>Message:</strong> {{ $data['message'] }}</p>
        <p><strong>Data Name:</strong> {{ $data['data']['name'] }}</p>
        <p><strong>Data Value:</strong> {{ $data['data']['value'] }}</p>
    @else
        <p>No data available.</p>
    @endif

</body>
</html>
