@extends('layouts.app')

@section('content')
<a href="/projects/create">New Project</a>
<ul>
    @forelse ($projects as $project)
    <li>
        <a href="{{ $project->path() }}">{{ $project->title }}</a>
    </li>
    @empty
    <li>No projects yet.</li>
    @endforelse
</ul>
@endsection