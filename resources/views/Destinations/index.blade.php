@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{route('destinations.create')}}" class="btn btn-success ">Add Destination</a>
</div>


<div class="card card-default">
    <div class="card-header">Destinations</div>

    <div class="card-body">
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($destinations as $destinations)
                <tr>
                    <td>
                        <img src="{{asset('/storage/' . $destinations->image)}}" width="120px" height="60px" class="img-thumbnail" alt="responsive image">
                    </td>
                    <td>
                        {{ $destinations->title }}
                    </td>
                    @if (!$destinations->trashed())
                     <td>
                        <a href="" class="btn btn-info btn-sm">Edit</a>
                    </td>
                    @endif
                   
                     <td>
                     <form action="{{route('destinations.destroy', $destinations->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            {{$destinations->trashed()? 'Delete':'Trash'}}
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection