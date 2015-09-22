@extends('master-page')
@section('Content')
    <div class="container">
        <form method="post" action="/createNewUser">
            {!! csrf_field() !!}
            <div class="row">
                <p><div class="col-md-6"><label for="newUser">User Name</label><input type="text" name="newUser" id="newUser" class="form-control"></div></p>
            </div>
            <div class="row">
                <p><div class="col-md-6"><label for="newPass">Your new Password</label><input type="text" name="newPass" id="newPass"></div></p>
            </div>
            <div class="row">
                <p><div class="col-md-6"><label for="conPass">Confirm your Password</label><input type="text" name="conPass" id="conPass"></div></p>
            </div>
            <div class="row">
                <p><div class="col-md-6"><label for="new_mail">E-mail</label><input type="text" name="new_mail" id="conPass"></div></p>
            </div>
            <div>
                <button type="submit" id="P_register">Submit</button>
            </div>
        </form>
    </div>
@stop
