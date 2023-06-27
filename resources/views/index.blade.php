<x-app-layout>
  <section class="px-10">
    <div class="flex justify-between">
      <div>
        <form action="{{ route('tasks.index') }}" method="GET">
          <select name="project_id" onchange="this.form.submit()">
            <option value="">All Projects</option>
            @if ($projectId)
              @foreach ($projects as $project)
                <option value="{{ $project->id }}" @if ($projectId == $project->id) selected @endif>
                  {{ $project->name }}
                </option>
              @endforeach
            @else
              @foreach ($projects as $project)
                <option value="{{ $project->id }}">
                  {{ $project->name }}
                </option>
              @endforeach
            @endif
          </select>
        </form>
      </div>

      <div class="mr-2 flex flex-wrap justify-center items-center space-y-1 space-x-2">
        <a href="{{ route('projects.create') }}" class="bg-cyan-500 py-1.5 px-4 rounded-md text-white">Create
          Project</a>
        <a href="{{ route('tasks.create') }}" class="bg-cyan-500 py-1.5 px-4 rounded-md text-white">Create
          Task</a>
      </div>
    </div>
    <div class="py-10">
      <ul id="sortable">
        @foreach ($tasks as $task)
          <x-task :task="$task" />
        @endforeach
      </ul>
    </div>
  </section>
</x-app-layout>
