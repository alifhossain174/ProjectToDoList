@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header bg-success text-white">
                        <div class="row">
                            <div class="col-lg-12">
                                <b style="text-shadow: 1px 1px 2px black;">Create New Task</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="border-left: 1px solid #ADBC7A !important; border-bottom: 1px solid #ADBC7A !important;">
                        <form action="{{url('save/task')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                @if (count($errors) > 0)
                                <div class="col-lg-12">
                                    <div class="alert alert-sm alert-danger d-block w-100">
                                        <ul class="m-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title"><b>Task Title</b></label>
                                        <input type="text" name="title" id="title" class="form-control" placeholder="Write Task Title Here..." required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="form-group">
                                        <label for="ck_description"><b>Task Description</b></label>
                                        <textarea name="ck_description" id="ck_description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-right mt-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success rounded">Save Task</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_js')
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('ck_description', {
            filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
            height: 250,
        });
    </script>
@endsection
