@extends('layouts.main')
@section('container')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
        <form action="/blog">
          
          @if (request('category'))
              <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('authors'))
              <input type="hidden" name="authors" value="{{ request('authors') }}">
          @endif

          <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search Here.." name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit" id="button-addon2">Search</button>
          </div>
      </form>
      </div>
    </div>

    @if ($post->count())
    <div class="card mb-3">
      @if ($post[0]->image)
      <div style="max-height: 400px; overflow:hidden;"><img src="{{ asset('storage/' . $post[0]->image) }}" class="card-img-top" alt="{{ $post[0]->category->name }}" class="img-fluid"></div>
      @else
      <img src="https://source.unsplash.com/1200x400?{{ $post[0]->category->name }}" class="card-img-top" alt="{{ $post[0]->category->name }}">
      @endif
        <div class="card-body text-center">
          <h3 class="card-title"><a href="/posts/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{ $post[0]->title }}</a></h3>
          <p>
            <small class="text-muted">
                By <a href="/blog?authors={{ $post[0]->author->username }}" class="text-decoration-none">{{ $post[0]->author->name }}</a> in <a href="/blog?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans()}}
            </small>
          </p>
          <p class="card-text">{{ $post[0]->excerpt }}</p>
          <a href="/posts/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">read more</a>
        </div>
    </div>      
    


   <div class="container">
    <div class="row">
        @foreach ($post->skip(1) as $dt)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.4)"><a href="/blog?category={{ $post[0]->category->slug }}" class="text-decoration-none text-white">{{ $dt->category->name }}</a></div>

                @if ($dt->image)
                <img src="{{ asset('storage/' . $dt->image) }}" class="card-img-top" alt="{{ $dt->category->name }}" class="img-fluid">
                @else
                <img src="https://source.unsplash.com/500x400?{{ $dt->category->name }}" class="card-img-top" alt="{{ $dt->category->name }}">
                @endif

                <div class="card-body">
                  <h5 class="card-title"><a href="/posts/{{ $dt->slug }}" class="text-decoration-none">{{ $dt->title }}</a></h5>
                  <p>
                    <small class="text-muted">
                        By <a href="/blog?authors={{ $dt->author->username }}" class="text-decoration-none">{{ $dt->author->name }}</a> {{ $dt->created_at->diffForHumans()}}
                    </small>
                  </p>
                  <p class="card-text">{{ $dt->excerpt }}</p>
                  <a href="/posts/{{ $dt->slug }}" class="btn btn-primary">read more</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
        {{ $post->links() }}
     </div>
   </div>
   
   
    @else
      <p class="text-center fs-4">no post found</p>
    @endif

    
@endsection
