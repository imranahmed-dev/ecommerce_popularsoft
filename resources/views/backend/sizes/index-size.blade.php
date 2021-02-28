@extends('backend.layouts.master')
@section('title','Sizes')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Sizes</li>
    </ol>
    <h1 class="page-header">Sizes</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-inverse">

                <div class="panel-heading">
                    <h4 class="panel-title">Size List</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="{{route('size.store')}}" method="post">
                                @csrf
                                <div class="form-group row my-4 pb-2">
                                    <div class="col-md-6">
                                        <input type="text" name="size" placeholder="Enter size name" class="form-control">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('size'))?($errors->first('size')):''}}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Create</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Size Name</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            @php
                            $dataCount = App\Models\ProductSize::where('size_id',$row->id)->count();
                            @endphp
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->size}}</td>
                                <td>
                                    <a href="{{route('size.edit',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    @if($dataCount < 1)
                                    <a id="delete" href="{{route('size.destroy',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection