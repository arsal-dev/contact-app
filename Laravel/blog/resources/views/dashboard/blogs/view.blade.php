@extends('dashboard.layouts')

@section('content')
    <h3>view blogs</h3>
    <a href="{{ route('trash.blog') }}" class="btn btn-danger" style="float: right">View Trash</a>
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
                                <th>status</th>
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
                                <th>status</th>
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
                                    <td>{{ $blog->status }}</td>
                                    <td><button class="btn btn-primary">Edit</button>
                                        <form action="{{ route('delete.blog', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" name="submit" value="delete" class="btn btn-danger">
                                        </form>
                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-info"
                                            id="{{ $blog->id }}" onclick="view(this)">View</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Status: <b id="status">Rejected</b></h1>
                    <h3>Reason: <b id="reason">Jo b reason hai</b></h3>
                    <h3>Body:</h3>
                    <p id="body">blog body</p>

                    <a href="#" id="review-btn" class="btn btn-primary">submit for a review</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        async function view(btn) {
            let res = await fetch(`fetch-blog/${btn.id}`);
            res = await res.json();
            document.querySelector('#status').innerHTML = res.status;
            document.querySelector('#reason').innerHTML = res.reason;
            document.querySelector('#body').innerHTML = res.body;
            document.querySelector('#review-btn').setAttribute('href', `/submit-review/${res.id}`);
        }
    </script>
@endsection
