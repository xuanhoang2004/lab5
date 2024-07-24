@extends('layoutadmin')

@section('title')

Thêm mới sản phẩm
@endsection
@section('content')

    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="name" class="form-control" name="name" placeholder="Nguyễn Văn A" value="{{old('name')}}">
            @error('name')
                  <p style="color: red">{{$message}}</p>
            @enderror('name')
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" placeholder="10000" value="{{old('price')}}">
            @error('price')
                  <p style="color: red">{{$message}}</p>
                @enderror('price')
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" name="quantity" placeholder="100" value="{{old('quantity')}}">
            @error('quantity')
                  <p style="color: red">{{$message}}</p>
                @enderror('quantity')
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            @error('image')
                  <p style="color: red">{{$message}}</p>
                @enderror('image')
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select form-select-lg mb-3" name="category_id">
            <option value="" disabled selected>Chọn danh mục</option>
                @foreach($listCate as $category)
                        <option value="{{ $category->id }}" @if($category->id ==old ('category->id')) selected @endif >{{ $category->name }}</option>
                @endforeach
               
            </select>
            @error('category_id')
                <p style="color: red">{{ $message }}</p>
            @enderror
           
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
        <a class="btn btn-light" href="{{route('product.index')}}">Quay lại trang chủ</a>
    </form>
@endsection()
