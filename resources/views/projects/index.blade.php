<x-app-layout>
  <section class="px-10">
    <div class="flex justify-between">
      <div class="ml-2">
        @unless (route('projects.index'))
          <form action="{{ route('tasks.index') }}" method="GET">
            <select name="project_id" onchange="this.form.submit()" class="border border-1 px-4 py-1.5 rounded-md">
              <option value="">All Projects</option>
              @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}
                </option>
              @endforeach
            </select>
          </form>
        @endunless
      </div>

      <div class="mr-2">
        <a href="{{ route('projects.create') }}" class="bg-cyan-500 py-1.5 px-4 rounded-md text-white">Create
          Project</a>
        <a href="{{ route('tasks.create') }}" class="bg-cyan-500 py-1.5 px-4 rounded-md text-white">Create
          Task</a>
      </div>
    </div>
    <div class="py-10">
      <ul>
        @foreach ($projects as $project)
          <x-project :project="$project" />
        @endforeach
      </ul>
    </div>
  </section>
</x-app-layout>
