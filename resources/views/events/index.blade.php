<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    {{-- message toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <title>Events</title>
</head>

<body>
    {!! Toastr::message() !!}
    <div class="continer">

        <div class="row">

            <div class="col-md-8 offset-2">
                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@sortablelink('title', 'Title')</th>
                                    <th scope="col">@sortablelink('start_date', 'Start Date')</th>
                                    <th scope="col">@sortablelink('end_date', 'End Date')</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Edit</th>
                                </tr>
                            </thead>
                            @if (count($events) > 0)

                                <tbody>
                                    @foreach ($events as $event)
                                        <tr id="eid{{ $event->id }}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ $event->start_date }}</td>
                                            <td>{{ $event->end_date }}</td>
                                            <td>
                                                <button class="deleteEvent btn btn-primary" data-id="{{ $event->id }}"
                                                    data-token="{{ csrf_token() }}">Delete Event</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('events.edit', $event) }}"
                                                    class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center">No data available</td>
                                    </tr>
                                </tbody>
                            @endif

                        </table>
                        <a href="{{ route('events.create') }}" class="btn btn-primary">Add Events</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        $(".deleteEvent").click(function() {
            var id = $(this).data("id");
            var token = $(this).data("token");
            // alert(id);
            $.ajax({
                url: "/events/delete/" + id,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function() {
                    $('#eid' + id).remove();
                }
            });
            console.log("It failed");
        });
    </script>
</body>

</html>
