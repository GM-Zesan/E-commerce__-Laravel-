@extends('backend/template')

@section('ttitle')
    Category List
@endsection

@section('title')
    Category View
@endsection

@section('content')
    <div class="col-md-6 ml-auto mr-auto">
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Categories Id : </b></td>
                            <td>{{ $cat->id }}</td>
                        </tr>
                        <tr>
                            <td><b>Categories Name : </b></td>
                            <td> {{ $cat->categories_name }}</td>
                        </tr>

                        <tr>
                            <td><b>Categories Slug : </b></td>
                            <td>{{ $cat->categories_slug }}</td>
                        </tr>
                        <tr>
                            <td><b>Created At : </b></td>
                            <td>{{ $cat->created_at }}</td>
                        </tr>
                    
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    <!-- /.card -->
    </div>
@endsection