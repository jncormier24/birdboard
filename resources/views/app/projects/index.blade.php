@extends('layouts.app')

@section('content')
<header class="flex flex-row justify-between items-end py-3">
    <h3 class="font-normal text-grey">My Projects</h3>
    <a class="button-blue" href="/projects/create">New
        Project</a>
</header>
<main class="container mx-auto py-4">
    <div class="projects flex flex-wrap -mx-3">
        @forelse ($projects as $project)
        <div class="w-1/3 px-3 pb-5">
            @include ('app.projects._card')
        </div>
        @empty
        <div>No projects yet.</div>
        @endforelse
</main>
</div>
@endsection