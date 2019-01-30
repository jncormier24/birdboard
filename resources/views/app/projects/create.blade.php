@extends('layouts.app')

@section('content')
<h1>Create A Project</h1>

<form method="POST" action="/projects">
    @csrf

    <div class="form-field">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
    </div>

    <div class="form-field">
        <label for="description">description</label>
        <textarea name="description" id="description">{{ old('description') }}</textarea>
    </div>

    <button>Save</button>
    <a href="/projects">Cancel</a>
</form>
@endsection