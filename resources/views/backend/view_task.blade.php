@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header bg-info text-white">
                        <div class="row">
                            <div class="col-lg-12">
                                <b style="text-shadow: 1px 1px 2px black;">Edit Your Task</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="border-left: 1px solid #ADBC7A !important; border-bottom: 1px solid #ADBC7A !important;">

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="title"><b>Task Title :</b> {{$task->title}}</label>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <label for="title"><b>Task Description: </b></label><br>
                                {!! $task->description !!}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
