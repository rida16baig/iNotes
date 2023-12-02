@extends('layout')
@section('title', 'Read iNOTE')
@section('content')
    @if (Session::has('msg'))
        <p class="text-center"> {{ Session::get('msg') }} !</p>
    @endif
    <h2 class="text-center mt-3"><u><b>Your All Notes</b></u></h2>
    <div class="container mt-5">
        <table class="table table-dark table-bordered table-hover form bg-dark container">
            <thead>
                <tr class="m-2 text-center">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Note</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($data as $row)
                    <tr class="m-2 text-center">
                        <td class="text-center">{{ $i }}</td>
                        <td class="text-center">{{ $row->title }}</td>
                        <td class="text-center">{{ $row->excerpt }}</td>
                        <td class="text-center">{{ $row->body }}</td>
                        <td class="text-center"><a href="{{ route('post.edit', ['id' => $row->id]) }}"
                                class="btn btn-primary">EDIT</a></td>
                        <td>
                            <form method="post" action="{{ route('post.delete', ['id' => $row->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>

                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>

        {{ $data->links() }}
    </div>
@endsection
