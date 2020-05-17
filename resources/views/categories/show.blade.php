@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>{{ $category->name }}</h1>
                <br />
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Categories</h1>
                <div class="list-group">
                    @foreach($categories as $cat)
                        <a href="/category/{{ $cat->id }}" class="list-group-item">{{ $cat->name }}</a>
                    @endforeach
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <div class="row">
                    @foreach($category->products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                @if ($product->image)
                                    <a href="#"><img class="card-img-top" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"></a>
                                @else
                                    <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                                @endif
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#"> {{ $product->name }} </a>
                                    </h4>
                                    <h5>${{ $product->price }} </h5>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col-lg-9 -->
        </div>
        <!-- /.row -->
    </div>
@endsection