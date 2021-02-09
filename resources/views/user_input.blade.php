<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="">
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="text-center form-signin" action="/input/store" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal">Input Valid Data</h1>
                    <label for="id">RFID ID</label>
                    
                    <input type="text" id="id" name="id" class="form-control" placeholder="RFID ID" required autofocus>
                    
                    <label for="valid_date" >Valid Date</label>
                    <input type="date" id="valid-date" name="valid_date" class="form-control" placeholder="Valid Date" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                </form>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">Valid Card List</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Card Id</th>
                                    <th scope="col">Valid Until</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                                @foreach($data as $data)
                                <tr>
                                    <th> @php echo $i; $i++; @endphp
                                    </th>
                                    <td> {{ $data->card_id }}</td>
                                    <td>{{ $data->valid_date }}</td>
                                    <td>
                                        <a class="btn btn-danger" href="/input/delete/{{ $data->id }}">Delete</a>
                                        <a class="btn btn-warning" href="/input/edit/{{ $data->id }}">Edit/Renew</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>