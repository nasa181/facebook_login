@extends('master-page')
@section('Content')
    <div class="container" >
        <form method="post" action="/">
            {!! csrf_field() !!}
            @if($something)
                <label> username or password is not correct</label>
            @endif
            @if($ok)
                <label> registration is success</label>
            @endif
            <div class="row">
                <p><div class="col-md-6"><label for="1Institution">User Name</label>&nbsp; <input type="text" name="name_userName" id="id_userName" class="form-control"></div></p>
                <p><div class="col-md-6"><label for="1Degree">Password</label>&nbsp; <input type="text" name="name_password" id="id_password"  class="form-control"></div></p>
            </div>
            <div class="row"><button type="submit" class="btn btn-danger btn-block turnAround" id="P_login">Login</button><span>OR</span><a href="login/fb" class="bigCharecter">Login with Facebook</a></div>
        </form>
    </div>
@stop
@section('under_square')
    <div class="row">
        <p>
        <div><label>Need to participate? Let's click to join us!!</label>&nbsp; <button type="button" id="P_register" class="turnAround" onclick="P_reg()">register</button></div>
        </p>
    </div>
    <script>
        function P_reg(){
            location.href='../createNewUser';
        }
    </script>
@stop

