<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EchoChat Login</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>EchoChat Login</h1>
        <button onclick="fireEvent()">Login</button>
    </div>
    <script>
        function fireEvent() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '{{ route('boradcast') }}',
                type: 'POST',
                success: function(data) {
                    console.log(data);
                }
            })
        }
    </script>
</body>

</html>
