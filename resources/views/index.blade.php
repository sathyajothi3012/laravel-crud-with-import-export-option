<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Include jQuery DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <style>
        .form-group {
            width: 80%;
            margin: auto;
        }
        .red{
            color:red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <span style="position: absolute; top: 0; right: 5px; cursor: pointer;"
                            onclick="this.parentElement.style.display='none';">&times;</span>
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>
        </div>
        <h3>User data management</h3>
        <div class="row">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <form class="form-group d-flex" id="importing" action="{{ route('import') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="importFile" id="importFile" class="form-control" autocomplete="off"
                        style="height: 39px;width: 30%;">
                        <span class="red">{{ $errors->first('importFile') }}</span>
                    <input type="submit" value="Import Data" id="importBtn" class="btn btn-success ml-4"
                        autocomplete="off" style="width: 15%;margin-left: 2%;">
                </form>

                <div>
                    <a href="{{ route('download_Excel') }}" class="btn btn-info mr-2">Export</a>
                </div>
                <div>
                    <a href="{{ route('create') }}" class="btn btn-primary" style="margin-left: 15px;">Add user</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div>
                <div class="card-bady">
                    <table id="dataTable" class="table table-hover" border="1">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Name</th>
                                <th>Phone No</th>
                                <th>Email</th>
                                <th>State</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($data->isNotEmpty())
                                @php $sno = 1; @endphp
                                @foreach($data as $datas)
                                    <tr>
                                        <td>{{ $sno++ }}</td>
                                        <td>{{$datas->name}}</td>
                                        <td>{{$datas->phone_no}}</td>
                                        <td>{{$datas->email}}</td>
                                        <td>{{$datas->state}}</td>
                                        <td>{{$datas->address}}</td>

                                        <td>
                                            <a href="{{Route('view', $datas->id)}}" class="btn btn-primary">View</a>
                                            <a href="{{Route('edit', $datas->id)}}" class="btn btn-warning">Edit</a>
                                            <a href="#" class="btn btn-danger" onclick="deleteData({{$datas->id}});">Delete</a>

                                            <form id="delete-{{$datas->id}}" action="{{ route('delete', $datas->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- Include jQuery and DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        function deleteData(id) {
            if (confirm("Are you sure to delete the data?")) {
                document.getElementById("delete-" + id).submit();
            }
        }
    </script>
</body>

</html>