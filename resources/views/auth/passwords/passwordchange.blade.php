@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Password Change</div>


                 
                    <!-- session message start -->
            <p class="alert-danger" style="font-size: 20px; text-align: center;">
                <?php 
                    $message = Session::get('Errormsg');
                    if ($message) {
                        echo $message;
                        session::put('Errormsg', null);
                    }
                 ?>
            </p>
            <!-- sesstion message end -->

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('oldpass') ? ' has-error' : '' }}">
                            <label for="oldpass" class="col-md-4 control-label">Old Password</label>

                            <div class="col-md-6">
                                <input id="oldpass" type="password" class="form-control" name="oldpass" value="{{ $oldpass or old('oldpass') }}" required autofocus>

                                @if ($errors->has('oldpass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('oldpass') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
