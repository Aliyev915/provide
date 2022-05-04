<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mail from {{ $fullname }}</title>
</head>
<body>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Fullname</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Message</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $fullname }}</td>
            <td>{{ $email }}</td>
            <td>{{ $phone }}</td>
            <td>{{ $message }}</td>
          </tr>
        </tbody>
      </table>
</body>
</html>