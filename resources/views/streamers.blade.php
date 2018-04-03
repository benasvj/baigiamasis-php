@extends('layouts.app')

@section('content')

    <div class="container-fluid" id="content">
        <h1 class="text-primary text-center">Streamer`iai</h1>
        <div id="buttons">
            <button id="all" class="btn btn-primary">Visi</button>
            <button id="on" class="btn btn-primary">Online</button>
            <button id="off" class="btn btn-primary">Offline</button>
        </div><hr>

        <div id="tv" class="row-left">
            <div id="twitch"></div>
            <div id="online"></div>
            <div id="offline"></div>
        </div>
    </div>

    <hr class="hr">
@endsection
@section('js')
    <script>
        
        var channelList = ["sauliuslol", "chosenonelol", "loltyler1", "GubbaTV", "Voyboy", "RobotCaleb", "noobs2ninjas", "freecodecamp"];
        var channelName
        var channelID
        var channelLink
        var channelLogo
        var streamContent

        $(document).ready(function (){
            $.each(channelList, function (i, val) {
                $.getJSON('https://wind-bow.gomix.me/twitch-api/streams/' + val +'?callback=?', function (st) {
                    channelName = val;
                        if (st.stream == null){
                            $.getJSON('https://wind-bow.gomix.me/twitch-api/channels/' + channelName + '?callback=?', function (ch) {
                                channelID = ch.display_name;
                                channelLogo = ch.logo;
                                channelLink = ch.url;
                                streamContent = ch.status;

                                if (ch.status == '404'){
                                    $('#twitch').append('<div class="row text-left">' + ch.message + '</div>')
                                }

                                else $('#offline').append('<div class="streamer-box"><img class="image" src=' + channelLogo + '><div class="insider"><p><a href=' + channelLink + ' target ="_blank">' + channelID + '</a></p> <span>OFFLINE</span> </div></div><br>');
                            })

                        }

                        else $.getJSON('https://wind-bow.gomix.me/twitch-api/channels/' + channelName + '?callback=?', function (ch) {
                            channelID = ch.display_name;
                            channelLogo = ch.logo;
                            channelLink = ch.url;
                            streamContent = ch.status;

                            $('#online').append('<div class="streamer-box"><img class="image" src=' + channelLogo + '><div class="insider"><p><a href=' + channelLink + ' target ="_blank">' + channelID + '</a></p>  <p>ONLINE</p>  Streamas: <h6> ' + streamContent + ' </h6></div></div><br>');
                })
            })
        })
            $('#all').click(All);
            $('#on').click(Online);
            $('#off').click(Offline);
        })
    
        function All(){
            $('#online').show();
            $('#offline').show();
            $('#twitch').hide();
        }

        function Online(){
            $('#twitch').hide();
            $('#offline').hide();
            $('#online').show();
        }

        function Offline(){
            $('#twitch').hide();
            $('#online').hide();
            $('#offline').show();
        }
    </script>
@endsection


