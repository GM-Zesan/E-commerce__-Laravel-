@extends('backend/template')

@section('ttitle')
    Slider
@endsection

@section('title')
    All Slider List
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Slider Image</th>
                        <th>First Title</th>
                        <th>Second Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($slider as $key => $row)
                    <tr class="odd gradeX">
                        <td>{{ $key+1 }}</td>
                        <td>
                            @if($row->sliders_image)
                                <img src="{{ URL::to($row->sliders_image) }}" alt="image" style="height: 60px; width:90px;" >
                            @else
                                <img src="{{ URL::to('public/backend/image/akun.png') }}" alt="image" style="height: 60px; width:90px;" >
                            @endif
                        </td>
                        
                        <td>{{ $row->sliders_first_title }}</td>
                        
                        <td>{{ $row->sliders_second_title }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{route('slider.edit',$row->id)}}">
                                <i class="fa fa-edit"></i>
                            </a> 
                            <a class="btn btn-sm btn-danger" href="{{route('slider.delete',$row->id)}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>   
            <br>
        </div>
    </div>
@endsection