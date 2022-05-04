<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Subscribe mail from {{ $email }}</title>
</head>
<body>
    <div class="title">
        <h3>Subscribe mail from {{ $email }}</h3>
        <p>Successfully Subscribed</p>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $email }}</td>
          </tr>
        </tbody>
      </table>
</body>
</html>