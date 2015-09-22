@extends('master-page')
@section('Content')
    <div class="top">
        @if(Session::has('message'))
            {{ Session::get('message')}}
        @endif
        <h1>Login</h1>
        @if (!empty($data))
            Hello, {{{ $data['name'] }}}
            <img src="{{ $data['photo']}}">
            <br>
            Your email is {{ $data['email']}}
            <br>
            <a href="logout">Logout</a>
        @endif

        <button type="submit" onclick="P_logout()">Logout</button>
    </div>
    <script>
        function P_logout(){
            location.href='../logout';
        }
    </script>

@stop
