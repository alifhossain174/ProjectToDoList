@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header bg-success text-white">
                        <div class="row">
                            <div class="col-lg-6">
                                <b style="text-shadow: 1px 1px 2px black;">My To Do Lists</b>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="{{url('create/new/tasks')}}" class="btn btn-info btn-sm rounded" style="text-shadow: 1px 1px 2px black; box-shadow: 2px 2px 5px #1e1e1e"><i class="fas fa-plus"></i> Create New Task</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="border-left: 1px solid #ADBC7A !important; border-bottom: 1px solid #ADBC7A !important;">
                        <div class="table-responsive">
                            <table class="table table-striped data-table w-100" style="color: #1e1e1e;">
                                <thead>
                                    <tr style="background: cadetblue; color: white; text-shadow: 1px 1px 2px black;">
                                        <th scope="col" style="width: 10%" class="text-center">SL</th>
                                        <th scope="col" style="width: 50%" class="text-center">Task Title</th>
                                        <th scope="col" style="width: 10%" class="text-center">Status</th>
                                        <th scope="col" style="width: 15%" class="text-center">Created At</th>
                                        <th scope="col" style="width: 15%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lists as $index => $list)
                                    <tr @if($list->status == 1) style="background: #ade6ad;" @endif>
                                        <th class="text-center">{{ $index+$lists->firstItem() }}</th>
                                        <td class="text-left">{{$list->title}}</td>
                                        <td class="text-center">
                                            @if($list->status == 0)
                                                <span class="btn btn-sm btn-warning rounded" style="padding: 0.15rem 0.5rem;">Not Done</span>
                                            @else
                                                <span class="btn btn-sm btn-success rounded" style="padding: 0.15rem 0.5rem;">Done</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ date('h:i:s A, l jS \of F, Y', strtotime($list->created_at)) }}</td>
                                        <td class="text-center">
                                            @if($list->status == 0)
                                            <a href="{{url('/done/task')}}/{{$list->slug}}" class="mb-1 btn btn-success btn-sm rounded" onclick="return confirm('Are you sure?')"><i class="fas fa-check"></i></a>
                                            <a href="{{url('/edit/task')}}/{{$list->slug}}" class="mb-1 btn btn-warning btn-sm rounded"><i class="fas fa-edit"></i></a>
                                            @endif
                                            <a href="{{url('/delete/task')}}/{{$list->slug}}" class="mb-1 btn btn-danger btn-sm rounded" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a>
                                            @if($list->status == 1)
                                            <a href="{{url('/view/task')}}/{{$list->slug}}" class="mb-1 btn btn-info btn-sm rounded"><i class="fas fa-eye"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $lists->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
