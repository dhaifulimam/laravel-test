@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-lg-10">
            <h2 class="mb-4">{{ $post->title }}</h2>

            <a href="/dashboard/blog" class="mb-3 btn btn-success"><span data-feather="arrow-left"></span> back to all my posts</a>

            <a href="/dashboard/blog/{{ $post->slug }}/edit" class="mb-3 btn btn-warning"><span data-feather="edit"></span> edit</a>

            <form action="/dashboard/blog/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="mb-3 btn btn-danger" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            
            @if ($post->image)
            <div style="max-height: 350px; overflow:hidden;"><img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid"></div>
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!} 
            </article>
            
        </div>
    </div>
</div>
@endsection