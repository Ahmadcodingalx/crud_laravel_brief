<!DOCTYPE html>
<html lang="fr">

<head>
    @yield('css')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Admin Vs Users</title>
</head>

<body>
    @yield('content')

        <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/datatable/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            });
        </script>

    @yield('js')
</body>

</html>
