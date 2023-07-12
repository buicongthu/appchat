<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <style>
        .sidebar {
            width: 200px;
            background-color: #f1f1f1;
            padding: 20px;
        }

        .content {
            flex: 1;
            background-color: #e9e9e9;
            padding: 20px;
        }

        .conversation-content {
            display: none;
        }

        .conversation-content.active {
            display: block;
        }
    </style>
</head>

<body>
    
    <div class="sidebar">
        <ul>
            <li class="conversation" data-conversation="1">Cuộc trò chuyện 1</li>
            <li class="conversation" data-conversation="2">Cuộc trò chuyện 2</li>
            <li class="conversation" data-conversation="3">Cuộc trò chuyện 3</li>
        </ul>
    </div>

    <div class="content">
        <div id="conversation-1" class="conversation-content">
            Nội dung cuộc trò chuyện 1
        </div>
        <div id="conversation-2" class="conversation-content">
            Nội dung cuộc trò chuyện 2
        </div>
        <div id="conversation-3" class="conversation-content">
            Nội dung cuộc trò chuyện 3
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('.conversation').click(function() {
                var conversationId = $(this).data('conversation');

                $('.conversation').removeClass('active');
                $(this).addClass('active');

                $('.conversation-content').removeClass('active');
                $('#conversation-' + conversationId).addClass('active');
            });
        });
    </script>
</body>

</html>
