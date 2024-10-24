@extends('dashboard.layouts')

@section('content')
    <h3>deleted blogs</h3>
    <div class="container">
        <div class="card p-5">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>thumbnail</th>
                                <th>title</th>
                                <th>excerpt</th>
                                <th>category</th>
                                <th>user</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>thumbnail</th>
                                <th>title</th>
                                <th>excerpt</th>
                                <th>category</th>
                                <th>user</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td><img src="{{ asset("assets/thumbnails/$blog->thumbnail") }}" width="100px"
                                            alt=""></td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->excerpt }}</td>
                                    <td>{{ $blog->Category->title }}</td>
                                    <td>{{ $blog->User->name }}</td>
                                    <td><a href="{{ route('restore.blog', $blog->id) }}" class="btn btn-primary">Restore</a>
                                        <form action="{{ route('delete.blog.forever', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" name="submit" value="delete forever"
                                                class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
