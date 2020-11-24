@extends('layouts.master')
@section('title', '2am Music Player')
@section('content')
    <div>
        <span class="login100-form-title p-b-41">
            Add New Track
        </span>
        <form class="card p-5" method="post" action="{{ route('songs.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <a href="{{ route('songs.index') }}" class="float-right btn-link">Songs List</a>
            </div>
            <div class="form-group">
                <label for="title" class="mb-2">Song Name</label>
                <input class="form-control" type="text" id="title" name="title" placeholder="track title"
                    autocomplete="off">
                @error('title')
                    <span class="text-danger"> * {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="file" class="mb-2">Import Music</label>
                <input class="form-control" type="file" name="file" id="file">
                @error('file')
                    <span class="text-danger"> * {{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="songTypes" class="mb-2">Song Type</label>
                <select name="songTypes" id="songTypes" class="form-control">
                    @foreach ($songTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="container-login100-form-btn m-t-32">
                <button type="submit" class="login100-form-btn">
                    Add
                </button>
            </div>

        </form>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/custom/js/script.js') }}"></script>
@endsection
