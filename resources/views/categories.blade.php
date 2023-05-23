@extends('layouts.main')
@section('container')
    <h1>Post Categories</h1>

    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/blog?category={{ $category->slug }}" class="text-decoration-none text-white">
                    <div class="card bg-dark text-white">
                        <img src="https://source.unsplash.com/500x400?{{ $category->name }}" class="card-img" alt="...">
                        <div class="card-img-overlay d-flex align-items-center">
                            <h5 class="card-title flex-fill p-4 text-center fs-3" style="background-color: rgba(0,0,0,0.3)">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    
@endsection
