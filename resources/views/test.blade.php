<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document - Test</title>
</head>

<body>
    <form action="/api/courier/cancel-notify" method="POST">
        @csrf
        <p>ยกเลิกคูเรียร์</p>
        <input type="text" name="id">
        <button type="submit" class="btn btn-primary">Summit</button>

    </form>
</body>


</html>
