<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    {{-- message toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</head>

<body>
    <!-- /resources/views/post/create.blade.php -->

    {!! Toastr::message() !!}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Post Form -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 m-10">
                <div class="card mt-3">
                    <div class="card-body">
                        <h3>Enter the Event Details</h3>
                        <form class="form-group" method="post" action={{ route('events.update', $event) }}>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title">Event Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Event Title" value="{{ $event->title }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="description">Event Description</label>
                                    <input type="textarea" class="form-control" name="description" id="description"
                                        placeholder="Event Description" value="{{ $event->description }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="start_date">Event Start Date</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date"
                                        value="{{ $event->start_date }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="end_date">Event End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date"
                                        value="{{ $event->end_date }}"><br>
                                </div>
                                <input type="hidden" name="status" value="incomplete">
                                <div class="col-md-6">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
