<x-app-layout>
  <section class="max-w-xl mx-auto mb-12">

    <h2 class="text-center text-xl font-bold py-5">Edit Task</h2>
    <div class="p-5">
      <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
          <label for="project_id">{{ __('Projects') }}</label>
          <select id="project_id" name="project_id"
            class="px-2 py-1.5 border bg-gray/30 text-black focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 rounded-md block mt-1 w-full">
            <option value="0">All Projects</option>
            @foreach ($projects as $project)
              @if ($task->project_id === 0)
                <option value="{{ $project->id }}">{{ $project->name }}
                </option>
              @else
                <option value="{{ $project->id }}" @if ($project->id === $task->project->id) selected @endif>
                  {{ $project->name }} </option>
              @endif
            @endforeach

          </select>
          @error('project_id')
            <p class="error-message text-xs text-black/50 space-y-1 mt-2">{{ $message }}
            </p>
          @enderror
        </div>
        <div>
          <label for="name">{{ __('Name') }}</label>
          <input id="name"
            class="px-2 py-1.5 border bg-gray/30 text-black focus:border-cyan-500 focus:ring-1 focus:ring-cyan-500 rounded-md block mt-1 w-full"
            type="text" name="name" value="{{ old('name', $task->name) }}" />
          @error('name')
            <p class="error-message text-xs text-black/50 space-y-1 mt-2">{{ $message }}
            </p>
          @enderror
        </div>


        <div class="my-2 space-x-2 flex">
          <a class="bg-red-500 py-1.5 px-4 rounded-md text-white" href="{{ route('tasks.index') }}"
            id="cancel-button">Cancel</a>
          <button class="bg-cyan-500 py-1.5 px-4 rounded-md text-white">Save</button>
        </div>
      </form>
    </div>
  </section>
</x-app-layout>
