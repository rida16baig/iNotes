@extends('layout')
@section('title', 'iNOTE Recycle bin')
@section('content')
    @if (Session::has('msg'))
        <p class="text-center"> {{ Session::get('msg') }} !</p>
    @endif
    <a href="{{route('post.deleteAll')}}" class="btn btn-outline-danger m-3">Delete All</a>
    <h3 class="text-center mt-3">Recycle Bin</h3>
    <div class="container mt-5">
        <table class="table table-dark table-bordered table-hover bg-dark container">
            <thead>
                <tr class="m-2 text-center">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Message</th>
                    <th>Restore</th>
                    <th>Permanent Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($trashed_data as $row)
                    <tr class="m-2 text-center">
                        <td class="text-center">{{ $row->id}}</td>
                        <td class="text-center">{{ $row->title }}</td>
                        <td class="text-center">{{ $row->excerpt }}</td>
                        <td class="text-center">{{ $row->body }}</td>
                        <td class="text-center"><a href="{{ route('post.restore', ['id' => $row->id]) }}" class="btn btn-warning">Restore</a></td>
                        <td>
                            <form method="post" action="{{ route('post.forceDelete', ['id' => $row->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Permanent Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach           
            </tbody>
        </table>
    </div>
@endsection
