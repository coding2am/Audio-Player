@extends('layouts.master')
@section('title', '2am Music Player')
@section('content')
    <div class="card">
        {{-- flash back message start--}}
        @if (!empty(session()->get('success')))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong class="mr-1">Success!</strong>{!! session()->get('success') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        {{-- flash back message end--}}
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Song Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $num = 1; @endphp
                @foreach ($songs as $song)
                    <tr>
                        <td>{{ $num++ }}</td>
                        <td>{{ $song->title }}</td>
                        <td>
                            <form method="post" action="{{ route('songs.destroy', $song->id) }}"
                                onsubmit="return confirm('Are you Sure to Delete?')">
                                @csrf
                                @method('DELETE')
                                <input type="submit" name="btnsubmit" value="Delete" class="btn btn-sm btn-danger">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
