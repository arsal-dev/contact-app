@extends('dashboard.layouts')

@section('content')
    <h3>view blogs</h3>
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
                                <th>body</th>
                                <th>category</th>
                                <th>user</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>thumbnail</th>
                                <th>title</th>
                                <th>excerpt</th>
                                <th>body</th>
                                <th>category</th>
                                <th>user</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>asdas</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
