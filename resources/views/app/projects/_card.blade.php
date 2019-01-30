<div class="card">
    <h2 class="font-normal text-xl py-4 border-l-4 border-blue-light -ml-5 pl-4 mb-3">
        <a class="text-black no-underline" href="{{ $project->path() }}">
            {{ $project->title }}
        </a>
    </h2>
    <div class="font-normal text-grey-dark">{{ str_limit($project->description) }}</div>
</div>