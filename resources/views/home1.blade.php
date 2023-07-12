<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/home1.css') }} ">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

</head>


<body>

    <div class="container app">
        <div class="row app-one">
            <div class="col-sm-4 side">
                <div class="side-one">
                    <div class="row heading">
                        <div class="col-sm-3 col-xs-3 heading-avatar">
                            <div class="heading-avatar-icon">
                                <img src="{{ asset('images/avatar/' . Auth::user()->avatar) }}">

                            </div>
                        </div>
                        {{-- <li role="presentation" class="dropdown">  --}}
                            
                            
                            <span class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="about-us"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 100rem; background-color: transparent; border: none; font-size: 20px; color: #ccc">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="about-us" style="position: absolute">
                                    <li><a href="#">Our Story</a></li>
                                    <li><a href="#">Our Team</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </span>
                            <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                                <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
                            </div>
                    </div>

                    <div class="row searchBox">
                        <div class="col-sm-12 searchBox-inner">
                            <div class="form-group has-feedback">
                                <input id="searchText" type="text" class="form-control" name="searchText"
                                    placeholder="Search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>
                    {{-- {{ dd($userConversations) }} --}}
                    <div class="row sideBar">
                        @if (isset($userConversations))
                            @foreach ($userConversations as $userConversation)
                                <div class="row sideBar-body con " id=" {{ $userConversation['conversation_id'] }}">
                                    <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                        <div class="avatar-icon">
                                            <img id=" avatar-{{ $userConversation['user']->id }}"
                                                src="{{ asset('images/avatar/' . $userConversation['user']->avatar) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 sideBar-main">
                                        <div class="row">
                                            <div class="col-sm-8 col-xs-8 sideBar-name">
                                                <span class="name-meta">{{ $userConversation['user']->name }}
                                                </span>
                                            </div>
                                            <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                                <span class="time-meta pull-right">18:18
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif



                    </div>
                </div>

                <div class="side-two">
                    <div class="row newMessage-heading">
                        <div class="row newMessage-main">
                            <div class="col-sm-2 col-xs-2 newMessage-back">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10 newMessage-title">
                                New Chat
                            </div>
                        </div>
                    </div>

                    <div class="row composeBox">
                        <div class="col-sm-12 composeBox-inner">
                            <div class="form-group has-feedback">
                                <input id="composeText" type="text" class="form-control" name="searchText"
                                    placeholder="Search People">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row compose-sideBar">
                        @if (isset($user))
                            @foreach ($user as $item)
                                <div class="row sideBar-body mess" id="{{ $item->id }}">
                                    <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                        <div class="avatar-icon">
                                            <img src="{{ asset('images/avatar/' . $item->avatar) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-9 col-xs-9 sideBar-main">
                                        <div class="row">
                                            <div class="col-sm-8 col-xs-8 sideBar-name">
                                                <span class="name-meta">{{ $item->name }}
                                                </span>
                                            </div>
                                            <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                                <span class="time-meta pull-right">18:18
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif



                    </div>
                </div>
            </div>

            <div class="col-sm-8 conversation" style="display: none;" id="conversation-main">

                <div class="row heading">
                    <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                        <div class="heading-avatar-icon " id="heading-avatar-icon-header">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-7 heading-name">
                        <a class="heading-name-meta">John Doe
                        </a>
                        <span class="heading-online">Online</span>
                    </div>
                    <div class="col-sm-1 col-xs-1  heading-dot pull-right">
                        <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                </div>



                <div class="row message " id="message">
                    <div class="row message-previous">
                        <div class="col-sm-12 previous">
                            <a onclick="previous(this)" id="ankitjain28" name="20">
                                Show Previous Message!
                            </a>
                        </div>
                    </div>

                    <div class="row message-body">
                        <div class="col-sm-12 message-main-sender">
                            <div class="sender">
                                <div class="message-text">

                                </div>
                                <span class="message-time pull-right">

                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row message-body">
                        <div class="col-sm-12 message-main-receiver">
                            <div class="receiver">
                                <div class="message-text">

                                </div>
                                <span class="message-time pull-right">

                                </span>
                            </div>
                        </div>
                    </div>



                </div>


                <div class="row reply">
                    <div class="col-sm-1 col-xs-1 reply-emojis">
                        <i class="fa fa-smile-o fa-2x"></i>
                    </div>
                    <div class="col-sm-9 col-xs-9 reply-main">
                        <textarea class="form-control" rows="1" id="comment"></textarea>
                    </div>
                    <div class="col-sm-1 col-xs-1 reply-recording">
                        <i class="fa fa-microphone fa-2x" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-1 col-xs-1 reply-send">
                        <i class="fa fa-send fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>




    <script>
        $(function() {
            $(".heading-compose").click(function() {
                $(".side-two").css({
                    "left": "0"
                });
            });

            $(".newMessage-back").click(function() {
                $(".side-two").css({
                    "left": "-105%"
                });
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {

            var conversationItems = document.querySelectorAll('.mess');
            var id_receiver;
            var id_conversation;

            $('.makegroup').click(function() {
                $(this).next('.dropdown-menu').toggle();

            });

            conversationItems.forEach(function(item) {

                item.addEventListener('click', function() {

                    // Lấy thông tin của người được chọn
                    var avatarUrl = item.querySelector('.avatar-icon img').getAttribute('src');
                    var username = item.querySelector('.name-meta').textContent.trim();
                    id_receiver = this.id;
                    id_conversation = null;
                    // Thay đổi thuộc tính "src" của phần tử <img> trong header thành URL của avatar tương ứng
                    var avatarImg = document.querySelector('#heading-avatar-icon-header img');
                    avatarImg.setAttribute('src', avatarUrl);

                    var nameElement = document.querySelector('.heading-name-meta');
                    nameElement.textContent = username; // Thay 'New Name' bằng tên mới bạn muốn đặt
                    // Lấy thẻ div cần bỏ thuộc tính display:none
                    var myDiv = document.getElementById('conversation-main');

                    // Gán giá trị 'block' cho thuộc tính display
                    myDiv.style.display = 'block';
                    $.ajax({
                        url: '{{ url('getmessage') }}',
                        type: 'post',
                        data: {
                            id_receiver: id_receiver
                        },
                    }).done(function(response) {

                        var htmlContent = '';
                        if (response.messages) {
                            response.messages.forEach(function(message) {
                                if (message.sender_id == {{ Auth::user()->id }}) {
                                    // Tin nhắn từ người gửi
                                    htmlContent += '<div class="row message-body">';
                                    htmlContent +=
                                        '<div class="col-sm-12 message-main-sender">';
                                    htmlContent += '<div class="sender">';
                                    htmlContent += '<div class="message-text">';
                                    htmlContent += message.content;
                                    htmlContent += '</div>';
                                    htmlContent +=
                                        '<span class="message-time pull-right">';
                                    htmlContent += message.created_at;
                                    htmlContent += '</span>';
                                    htmlContent += '</div>';
                                    htmlContent += '</div>';
                                    htmlContent += '</div>';
                                } else {
                                    // Tin nhắn từ người nhận
                                    htmlContent += '<div class="row message-body">';
                                    htmlContent +=
                                        '<div class="col-sm-12 message-main-receiver">';
                                    htmlContent += '<div class="receiver">';
                                    htmlContent += '<div class="message-text">';
                                    htmlContent += message.content;
                                    htmlContent += '</div>';
                                    htmlContent +=
                                        '<span class="message-time pull-right">';
                                    htmlContent += message.created_at;
                                    htmlContent += '</span>';
                                    htmlContent += '</div>';
                                    htmlContent += '</div>';
                                    htmlContent += '</div>';
                                }
                            });
                        }

                        // Gán dữ liệu vào container tin nhắn
                        var messageContainer = document.getElementById('message');
                        messageContainer.innerHTML = htmlContent;

                    });


                });
            });

            $(document).on('click', '.con', function() {
                // load();
                var myDiv = document.getElementById('conversation-main');
                myDiv.style.display = 'block';
                id_conversation = $(this).attr('id');
                id_receiver = null;
                // alert(id_conversation);

                // alert(id);
                $.ajax({
                    url: '{{ url('getmessage') }}',
                    type: 'post',
                    data: {
                        id_conversation: id_conversation
                    },
                }).done(function(response) {

                    var htmlContent = '';
                    if (response.messages) {
                        response.messages.forEach(function(message) {
                            if (message.sender_id == {{ Auth::user()->id }}) {
                                // Tin nhắn từ người gửi
                                htmlContent += '<div class="row message-body">';
                                htmlContent +=
                                    '<div class="col-sm-12 message-main-sender">';
                                htmlContent += '<div class="sender">';
                                htmlContent += '<div class="message-text">';
                                htmlContent += message.content;
                                htmlContent += '</div>';
                                htmlContent += '<span class="message-time pull-right">';
                                htmlContent += message.created_at;
                                htmlContent += '</span>';
                                htmlContent += '</div>';
                                htmlContent += '</div>';
                                htmlContent += '</div>';
                            } else {
                                // Tin nhắn từ người nhận
                                htmlContent += '<div class="row message-body">';
                                htmlContent +=
                                    '<div class="col-sm-12 message-main-receiver">';
                                htmlContent += '<div class="receiver">';
                                htmlContent += '<div class="message-text">';
                                htmlContent += message.content;
                                htmlContent += '</div>';
                                htmlContent += '<span class="message-time pull-right">';
                                htmlContent += message.created_at;
                                htmlContent += '</span>';
                                htmlContent += '</div>';
                                htmlContent += '</div>';
                                htmlContent += '</div>';
                            }
                        });
                    }

                    // Gán dữ liệu vào container tin nhắn
                    var messageContainer = document.getElementById('message');
                    messageContainer.innerHTML = htmlContent;

                });

            });

            $(document).on('click', '.reply-send', function() {

                var content = $('#comment').val();

                if (id_receiver && !id_conversation) {

                    $.ajax({
                        url: '{{ url('sendmessage') }}',
                        type: 'post',
                        data: {
                            id_receiver: id_receiver,
                            content: content
                        },
                    }).done(function(res) {


                    });

                } else if (id_conversation && !id_receiver) {

                    $.ajax({
                        url: '{{ url('sendmessage') }}',
                        type: 'post',
                        data: {
                            id_conversation: id_conversation,
                            content: content
                        },
                    }).done(function(res) {


                    });
                }


            });

            // Đăng ký kênh và xử lý sự kiện với Pusher
            var pusher = new Pusher('76c3dc8a0703fa7ca44d', {
                cluster: 'ap1',
                encrypted: true
            });

            var channel = pusher.subscribe('chat');
            // Xử lý sự kiện tin nhắn mới
            channel.bind('ChatMessageEvent', function(data) {
                var content = data.message;
                var senderId = data.user.id;
                var loggedInUserId = '{{ Auth::id() }}'; // Lấy ID người dùng đang đăng nhập từ Laravel 

                console.log(data.user.avatar);
                // Tạo các phần tử HTML tin nhắn và thiết lập lớp CSS dựa trên người gửi
                var messageContainer = $('<div>').addClass('row message-body');
                var messageMain = $('<div>').addClass('col-sm-12');
                var messageContent = $('<div>').addClass('message-text').text(content);
                var messageTime = $('<span>').addClass('message-time pull-right');

                // Thiết lập lớp CSS và thông tin người gửi dựa trên vai trò
                if (senderId == loggedInUserId) {
                    messageMain.addClass('message-main-sender');
                    messageMain.append($('<div>').addClass('sender').append(messageContent).append(
                        messageTime));
                } else {
                    messageMain.addClass('message-main-receiver');
                    messageMain.append($('<div>').addClass('receiver').append(messageContent).append(
                        messageTime));
                }

                // Thêm tin nhắn vào container
                messageContainer.append(messageMain);
                $('#message').append(messageContainer);
            });



        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
