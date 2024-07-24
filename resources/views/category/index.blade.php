@extends('layoutadmin')

@section('content')
        <div class="d-sm-flex align-items-center justify-content-between ml-3">
            <h1 class="h3 mb-0 text-gray-800">Danh sách danh mục</h1>
        </div>
    <div class="container mt-5">
        <a href="{{route('category.create')}}" class="btn btn-primary mb-2">them moi <i class="fa fa-plus"></i></a>
        @if(session('msg'))
            <div class="alert alert-success" role="alert">
                {{session('msg')}}
            </div>
        @endif
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <th style="width: 25%;">Name</th>
                <th style="width: 25%;">slug</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th style="width: 20%;">Action</th>
            </tr>
        @foreach($listCate as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                
            </tr>
        @endforeach
        </table>
      
    </div>
@endsection()