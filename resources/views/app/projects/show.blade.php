@extends('layouts.app')

@section('content')
<header class="flex justify-between items-end mb-4">
    <h3 class="font-normal text-grey mr-3">
        <a href="/projects" class="font-normal text-grey no-underline">My Projects</a> \ {{ $project->title }}
    </h3>

    <button class="button-blue">Add Task</button>
</header>

<main>
    <div class="lg:flex -mx-3">
        <div class="lg:w-3/4 px-3 mb-5 lg:mb-0">
            <div class="mb-6">
                <h2 class="text-grey font-normal mb-3">Tasks</h2>
                <div class="card mb-3">
                    <p class="font-norma py-4 border-l-4 border-blue-light -ml-5 pl-4">
                        Task Here
                    </p>
                </div>
                <div class="card mb-3">
                    <p class="font-norma py-4 border-l-4 border-blue-light -ml-5 pl-4">
                        Task Here
                    </p>
                </div>
                <div class="card">
                    <p class="font-norma py-4 border-l-4 border-blue-light -ml-5 pl-4">
                        Task Here
                    </p>
                </div>
            </div>
            <div>
                <h2 class="text-grey font-normal mb-3">General Notes</h2>
                <textarea class="card w-full" style="min-height: 150px;"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam modi veniam qui tenetur quis ipsam, in ipsa. Quibusdam accusantium alias laudantium soluta laborum nihil suscipit, voluptatum labore totam, velit ea!</textarea>
            </div>
        </div>
        <div class="lg:w-1/4 px-3">
            @include('app.projects._card')
        </div>
    </div>
</main>

@endsection