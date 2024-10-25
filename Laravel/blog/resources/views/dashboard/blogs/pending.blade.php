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
                                    <td><a href="{{ route('approve.blog', $blog->id) }}" class="btn btn-primary">Approve</a>
                                        <button data-toggle="modal" data-target="#exampleModal" class="btn btn-danger"
                                            onclick="reject(this)" id="{{ $blog->id }}">Reject</button>
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
                    <form action="{{ route('blog.reject') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="hiddenId">
                        <div>
                            <label for="reason">reason</label>
                            <textarea name="reason" id="reason" cols="30" rows="5" class="form-control" placeholder="write a reason"></textarea>
                        </div>

                        <input type="submit" value="save" class="btn btn-primary mt-3">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function reject(btn) {
            document.querySelector('#hiddenId').value = btn.id;
        }
    </script>
@endsection
