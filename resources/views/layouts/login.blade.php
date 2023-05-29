@include('layouts.common.header')
<div class="container">
    @if(session('success'))
    <div class="alert alert-success text-center my-2">{{session('success')}}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger text-center my-2">{{session('error')}}</div>
    @endif
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="card p-4 my-4">

                <h2>Login</h2>
                <form action="{{route('login')}}" method="post" id="signup_form">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" />
                        @if ($errors->has('email'))
                        <label class="text-danger">{{ $errors->first('email') }}</label>
                        @endif
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                        @if ($errors->has('password'))
                        <label class="text-danger">{{ $errors->first('password') }}</label>
                        @endif
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="{{url('/signup')}}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@include('layouts.common.footer')
@include('layouts.common.scripts')