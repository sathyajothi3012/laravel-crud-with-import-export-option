<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View user data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-group {
            width: 80%;
            margin: auto;
            padding-bottom: 2%;
        }
        label{
            margin:2%;
        }
        span{
            margin:2%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-4">

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
        <div class="col-md-6 offset-md-3">
    <table class="table">
        <tbody>
            <tr>
                <th>Name:</th>
                <td>{{$data->name}}</td>
            </tr>
            <tr>
                <th>Phone No:</th>
                <td>{{$data->phone_no}}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{$data->email}}</td>
            </tr>
            <tr>
                <th>State:</th>
                <td>{{$data->state}}</td>
            </tr>
            <tr>
                <th>Address:</th>
                <td>{{$data->address}}</td>
            </tr>
            <tr>
                <th>Created At:</th>
                <td>{{$data->created_at}}</td>
            </tr>
        </tbody>
    </table>
</div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>