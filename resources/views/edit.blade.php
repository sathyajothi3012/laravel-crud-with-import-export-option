<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .form-group {
            width: 80%;
            margin: auto;
        }

        h3 {
            text-align: center;
        }

        #submit_btn {
            margin-top: 5%;
        }

        .error {
            color: red;
        }

        .red {
            color: red;
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
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('update', $data->id) }}" method="post" id="reg_form">
                    <h3>Update</h3>
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" value="{{old('name', $data->name)}}" id="name"
                            name="name" required>
                        <span class="red">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="phone_no">Phone No:</label>
                        <input type="text" class="form-control" value="{{old('phone_no', $data->phone_no)}}"
                            id="phone_no" name="phone_no" required>
                        <span class="red">{{ $errors->first('phone_no') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ old('email', $data->email) }}" required>
                        <span class="red">{{ $errors->first('email') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="state">State:</label>
                        <select name="state" id="state" class="form-control" required>
                            <option value="">Select</option>
                            <option value="Tamilnadu" {{ old('state', $data->state) == 'Tamilnadu' ? ' selected' : '' }}>
                                Tamilnadu
                            </option>
                            <option value="Kerala" {{old('state', $data->state) == 'Kerala' ? ' selected' : '' }}>Kerala
                            </option>
                            <option value="Karnataka" {{ old('state', $data->state) == 'Karnataka' ? ' selected' : '' }}>
                                Karnataka
                            </option>
                        </select>
                        <span class="red">{{ $errors->first('state') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea class="form-control" id="address" name="address"
                            rows="3">{{old('address', $data->address)}}</textarea>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="submit_btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#reg_form').validate({
                rules: {
                    name: {
                        required: true,
                        textonly: true
                    },
                    phone_no: {
                        required: true,
                        digits: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    state: {
                        required: true
                    },
                    address: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your name",
                        textonly: "Please enter a valid name"
                    },
                    phone_no: {
                        required: "Please enter your phone number",
                        digits: "Please enter a valid phone number"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    state: {
                        required: "Please select your state"
                    },
                    address: {
                        required: "Please enter your address"
                    }
                }
            });
        });
    </script>

</body>

</html>