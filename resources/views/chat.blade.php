<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
</head>

<body>
    <div class="container content">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12">
                <div class="card" style="background-color: #ffffff">
                    <div class="card-header">Chat</div>
                    <div class="card-body height3">
                        <ul class="chat-list" id="chat-section">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row message">
                <div class="col-lg-12">
                    <input type="test" name="username" id="username" value=" {{ $name }} " hidden>
                    <input type="text" class="form-control" class="text-message-input"
                        placeholder="Write Message Here...." id="text-message">
                    <button class="btn-message-send" onclick="boroadcastMethod()">Send</button>
                </div>
            </div>
        </div>
    </div>
</body>
@vite('resources/js/app.js')

<script>
    function boroadcastMethod() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: '{{ route('boradcast') }}',
            type: 'POST',
            data: {
                username:$('#username').val(),
                message:$('#text-message').val()
            },
            success: function(result) {
            },
            error: function(error) {
                console.log(error);
            }
        })
    }

    setTimeout(() => {
        window.Echo.channel('chatMessage').listen('MessageSent', (data) => {
            if (data.username.trim() === $('#username').val().trim()) {

                newMessage = `<li class="out">
                                <div class="chat-img">
                                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                </div>
                                <div class="chat-body">
                                    <div class="chat-message">
                                        <h5>${data.username}</h5>
                                        <p>${data.message}</p>
                                    </div>
                                </div>
                            </li>`;
            } else{
                console.log(data.username);
                console.log($('#username').val());
                newMessage = `<li class="in">
                                <div class="chat-img">
                                    <img alt="Avtar" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                </div>
                                <div class="chat-body">
                                    <div class="chat-message">
                                        <h5>${data.username}</h5>
                                        <p>${data.message}</p>
                                    </div>
                                </div>
                            </li>`;
            }
            console.log(data);
            $("#chat-section").append(newMessage);
        });
    }, 100);
</script>

</html>
