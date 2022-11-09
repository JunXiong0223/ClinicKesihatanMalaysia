<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
</head>
<body>
    <h3>Health Care Centre</h3>

    <h2>Hi {{$data['user']}},</h2>
    <p>{{ $data['body'] }}</p>

    <h3>Regard,</h3>
    <h3>Health Care Center</h3>
</body>
</html>