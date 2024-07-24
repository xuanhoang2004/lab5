@extends('layoutadmin')

@section('content')
<h1>danh sách sản phẩm</h1>
<a href="{{route('product.create')}}" class="btn btn-primary">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">image</th>
                <th scope="col">status</th>
                <th scope="col">Category name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listPro as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>
                        @if(!isset($item->image))
                            khong co hinh anh
                        @else
                            {{ $item->image }}
                        @endif
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->loadAllCategory->name }}</td>
               
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$listPro->links()}}
@endsection
