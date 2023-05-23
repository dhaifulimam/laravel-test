@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post</h1>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif

    @if (session()->has('danger'))
    <div class="alert alert-danger" role="alert">
      {{ session('danger') }}
    </div>
    @endif

    <a href="/dashboard/blog/create" class="btn btn-primary">Create New Post</a>
    <div class="table-responsive col-lg">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                <a href="/dashboard/blog/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/blog/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/blog/{{ $post->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are You Sure?')"><span data-feather="x-circle"></span></button>
                </form>
            </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection