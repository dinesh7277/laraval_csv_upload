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

                <h2>Signup</h2>
                <form action="{{route('signup')}}" method="post" id="signup_form">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="">Username</label>
                        <input type="text" id="username" name="username" class="form-control" />
                        @if ($errors->has('username'))
                        <label class="text-danger">{{ $errors->first('username') }}</label>
                        @endif
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="">Email address</label>
                        <input type="email" id="useremail" name="useremail" class="form-control" />
                        @if ($errors->has('useremail'))
                        <label class="text-danger">{{ $errors->first('useremail') }}</label>
                        @endif
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="">Password</label>
                        <input type="password" id="userpassword" name="userpassword" class="form-control" />
                        @if ($errors->has('userpassword'))
                        <label class="text-danger">{{ $errors->first('userpassword') }}</label>
                        @endif
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="">Confirm Password</label>
                        <input type="password" id="userpasswordconfirm" name="userpasswordconfirm" class="form-control" />
                        @if ($errors->has('userpasswordconfirm'))
                        <label class="text-danger">{{ $errors->first('userpasswordconfirm') }}</label>
                        @endif

                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Sign Up</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Already a member? <a href="{{url('/')}}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@include('layouts.common.footer')
@include('layouts.common.scripts')