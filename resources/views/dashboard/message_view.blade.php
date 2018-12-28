@extends('layouts.app')

@section('css')
    <style type="text/css">

        .inbox .inbox-menu ul {
            margin-top: 30px;
            padding: 0;
            list-style: none
        }

        .inbox .inbox-menu ul li {
            height: 30px;
            padding: 5px 15px;
            position: relative
        }

        .inbox .inbox-menu ul li:hover,
        .inbox .inbox-menu ul li.active {
            background: #e4e5e6
        }

        .inbox .inbox-menu ul li.title {
            margin: 20px 0 -5px 0;
            text-transform: uppercase;
            font-size: 10px;
            color: #d1d4d7
        }

        .inbox .inbox-menu ul li.title:hover {
            background: 0 0
        }

        .inbox .inbox-menu ul li a {
            display: block;
            width: 100%;
            text-decoration: none;
            color: #3d3f42
        }

        .inbox .inbox-menu ul li a i {
            margin-right: 10px
        }

        .inbox .inbox-menu ul li a .label {
            position: absolute;
            top: 10px;
            right: 15px;
            display: block;
            min-width: 14px;
            height: 14px;
            padding: 2px
        }

        .inbox ul.messages-list {
            list-style: none;
            margin: 15px -15px 0 -15px;
            padding: 15px 15px 0 15px;
            border-top: 1px solid #d1d4d7
        }

        .inbox ul.messages-list li {
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            cursor: pointer;
            margin-bottom: 10px;
            padding: 10px
        }

        .inbox ul.messages-list li a {
            color: #3d3f42
        }

        .inbox ul.messages-list li a:hover {
            text-decoration: none
        }

        .inbox ul.messages-list li.unread .header,
        .inbox ul.messages-list li.unread .title {
            font-weight: 700
        }

        .inbox ul.messages-list li:hover {
            background: #e4e5e6;
            border: 1px solid #d1d4d7;
            padding: 9px
        }

        .inbox ul.messages-list li:hover .action {
            color: #d1d4d7
        }

        .inbox ul.messages-list li .header {
            margin: 0 0 5px 0
        }

        .inbox ul.messages-list li .header .from {
            width: 49.9%;
            white-space: nowrap;
            overflow: hidden!important;
            text-overflow: ellipsis
        }

        .inbox ul.messages-list li .header .date {
            width: 50%;
            text-align: right;
            float: right
        }

        .inbox ul.messages-list li .title {
            margin: 0 0 5px 0;
            white-space: nowrap;
            overflow: hidden!important;
            text-overflow: ellipsis
        }

        .inbox ul.messages-list li .description {
            font-size: 12px;
            padding-left: 29px
        }

        .inbox ul.messages-list li .action {
            display: inline-block;
            width: 16px;
            text-align: center;
            margin-right: 10px;
            color: #d1d4d7
        }

        .inbox ul.messages-list li .action .fa-check-square-o {
            margin: 0 -1px 0 1px
        }

        .inbox ul.messages-list li .action .fa-square {
            float: left;
            margin-top: -16px;
            margin-left: 4px;
            font-size: 11px;
            color: #fff
        }

        .inbox ul.messages-list li .action .fa-star.bg {
            float: left;
            margin-top: -16px;
            margin-left: 3px;
            font-size: 12px;
            color: #fff
        }

        .inbox .message .message-title {
            margin-top: 30px;
            padding-top: 10px;
            font-weight: 700;
            font-size: 14px
        }

        .inbox .message .header {
            margin: 20px 0 30px 0;
            padding: 10px 0 10px 0;
            border-top: 1px solid #d1d4d7;
            border-bottom: 1px solid #d1d4d7
        }

        .inbox .message .header .avatar {
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            height: 34px;
            width: 34px;
            float: left;
            margin-right: 10px
        }

        .inbox .message .header i {
            margin-top: 1px
        }

        .inbox .message .header .from {
            display: inline-block;
            width: 50%;
            font-size: 12px;
            margin-top: -2px;
            color: #d1d4d7
        }

        .inbox .message .header .from span {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #3d3f42
        }

        .inbox .message .header .date {
            display: inline-block;
            width: 29%;
            text-align: right;
            float: right;
            font-size: 12px;
            margin-top: 18px
        }

        .inbox .message .attachments {
            border-top: 3px solid #e4e5e6;
            border-bottom: 3px solid #e4e5e6;
            padding: 10px 0;
            margin-bottom: 20px;
            font-size: 12px
        }

        .inbox .message .attachments ul {
            list-style: none;
            margin: 0 0 0 -40px
        }

        .inbox .message .attachments ul li {
            margin: 10px 0
        }

        .inbox .message .attachments ul li .label {
            padding: 2px 4px
        }

        .inbox .message .attachments ul li span.quickMenu {
            float: right;
            text-align: right
        }

        .inbox .message .attachments ul li span.quickMenu .fa {
            padding: 5px 0 5px 25px;
            font-size: 14px;
            margin: -2px 0 0 5px;
            color: #d1d4d7
        }

        .inbox .contacts ul {
            margin-top: 30px;
            padding: 0;
            list-style: none
        }

        .inbox .contacts ul li {
            height: 30px;
            padding: 5px 15px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis!important;
            position: relative;
            cursor: pointer
        }

        .inbox .contacts ul li .label {
            display: inline-block;
            width: 6px;
            height: 6px;
            padding: 0;
            margin: 0 5px 2px 0
        }

        .inbox .contacts ul li:hover {
            background: #e4e5e6
        }
    </style>
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row inbox">

                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body message">
                            <h2 class="text-center">{{$message->subject}}</h2>

                                <div class="form-group">
                                    <label for="to" class=" control-label">To:</label>
                                    <p>{{$message->to}}</p>
                                </div>

                                <div class="form-group">
                                    <label for="subject" class=" control-label">From:</label>
                                    <p>{{$message->from}}</p>
                                </div>

                                <div class="form-group">
                                    <label for="message" class=" control-label">Message:</label>
                                    <div class="card">
                                        <div class="card-body" style="overflow: auto;">
                                            <p id="message-container">{{$message->message}}</p>
                                        </div>
                                    </div>
                                    <p id="attachment-container" style="display: none; margin-top: 1em;"><a id="attachment" href="" target="_blank" >Attachment</a></p>
                                    <p id="alerts-container"></p>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="key" class=" control-label">Insert Encryption Key:</label>
                                            <input type="text" class="form-control select2-offscreen" id="key" name="key" required placeholder="Insert Key" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="button" onclick="decryptMessage()" class="btn btn-success">Decrypt</button>
                                </div>
                        </div>
                    </div>
                </div><!--/.col-->
            </div>

        </div>
        <!-- /.container-fluid-->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
@endsection

@section('js')
    <script type="text/javascript">

        function decryptionSuccessful(messageId){

            let data = {
                'message_id': messageId,
                '_token' : '{{ csrf_token() }}'
            };

            $.ajax({
                url:"{{route('message.decryption.success', ['id' => $message->id])}}",
                method:'GET',
                data:{data:data},
                dataType:'json',
                success: function(response){
                    $('#alerts-container').css('color', 'green');
                    $('#alerts-container').html(response);

                }
            })

        }

        function attempts(messageId){

            let data = {
                'message_id': messageId,
                '_token' : '{{ csrf_token() }}'
            };

            $.ajax({
                url:"{{route('message.decryption.attempts', ['id' => $message->id])}}",
                method:'GET',
                data:{data:data},
                dataType:'json',
                success: function(response){

                    $('#alerts-container').css('color', 'red');
                    $('#alerts-container').html(response.result);

                    if(response.success){
                        window.location = response.url;
                    }
                }
            })

        }

        function decryptMessage(){

            let data = {
                'message_id': {{$message->id}},
                'key': $('input[name=key]').val(),
                '_token' : '{{ csrf_token() }}'
            };

            $.ajax({
                url:"{{route('message.decrypt', ['id' => $message->id])}}",
                method:'GET',
                data:{data:data},
                dataType:'json',
                success: function(response){

                    $('#message-container').html(response.message); // Returns decrypted message

                    $('#attachment').attr("href", response.file); // Returns decrypted attachment

                    $('#attachment-container').css('display', 'block'); // Displays attachment

                    decryptionSuccessful({{$message->id}});

                },
                error: function (response) {

                    attempts({{$message->id}});
                }
            })

        }
    </script>
@endsection
