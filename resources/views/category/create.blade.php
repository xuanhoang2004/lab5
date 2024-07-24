@extends('layoutadmin')

@section('title')

Thêm mới danh mục
@endsection
@section('content')
    <div class="container">
     
       
        <form action="{{route('category.store')}}" method="post">
            @csrf
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
                @error('name')
                  <p style="color: red">{{$message}}</p>
                @enderror('name')
                
                <button type="submit" class="btn btn-primary mt-2">them moi</button>

        </form>
    </div>
    @endsection()