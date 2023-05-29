@include('layouts.common.header')
@include('layouts.common.nav')
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

                <h4>Upload CSV File</h4>
                <form action="{{route('uploadcsv')}}" method="post" id="uploadcsv_form" enctype="multipart/form-data">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline">
                        <input type="file" id="csvfile" name="csvfile" class="form-control" />
                        <label id="csvfile_error" class="text-danger"></label>
                        @if ($errors->has('csvfile'))
                        <label class="text-danger">{{ $errors->first('csvfile') }}</label>
                        @endif

                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Upload</button>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@include('layouts.common.footer')
@include('layouts.common.scripts')