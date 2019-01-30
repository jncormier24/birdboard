@extends('layouts.app')

@section('content')
<div class="w-2/3 mx-auto">
    <header class="mb-6">
        <h3 class="font-normal text-grey">Create A Project</h3>
    </header>

    <main>
        <form method="POST" action="/projects">
            @csrf

            <div class="form-field flex flex-col mb-3">
                <label class="text-grey font-normal my-2" for="title">Title</label>
                <input class="card" type="text" name="title" id="title" value="{{ old('title') }}">
            </div>

            <div class="form-field flex flex-col mb-3">
                <label class="text-grey font-normal my-2" for="description">Description</label>
                <textarea class="card" name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <button class="button-blue">Save</button>
            <a class="button bg-yellow text-yellow-darkest" href="/projects">Cancel</a>
        </form>
    </main>
</div>
@endsection