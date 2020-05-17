@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $product->name }} Edit</h1>
                <br />
                <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="first_name">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
                        @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="first_name">Image:</label>
                        <input type="file" class="form-control" name="image" value="{{ $product->image }}"  />
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" class="form-control" name="price" value="{{ $product->price }}" />
                        @if($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                @if ($category->id == $product->category_id)
                                    <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" name="description" cols="50" rows="20">
                            {{ $product->description }}
                        </textarea>
                        @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                <br />
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
@endsection