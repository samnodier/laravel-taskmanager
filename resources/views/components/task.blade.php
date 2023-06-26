@props(['task'])
<li id="{{ $task->id }}"
  class="select-none m-2 p-4 bg-gray-100 rounded-lg flex items-center justify-between
            shadow">
  <div class="flex no-wrap items-center">
    <div class="mr-4">
      <p>{{ $task->priority }} </p>
    </div>
    <div class="">
      <p class="line-clamp-1 p-1">{{ $task->name }}</p>
      <p class="text-xs text-gray-500 px-1">{{ $task->updated_at }}</p>
    </div>
  </div>
  <div class="font-semibold text-sm space-x-2 flex no-wrap">
    <a href="{{ route('tasks.edit', $task) }}" class="bg-cyan-500 text-white rounded-md px-4 py-1.5">Done</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
      @csrf
      @method('DELETE')
      <button class="bg-red-500 text-white rounded-md px-4 py-1.5">Delete</button>
    </form>
  </div>
</li>
