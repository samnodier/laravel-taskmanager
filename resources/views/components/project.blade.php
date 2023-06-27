@props(['project'])
<li id="{{ $project->id }}"
  class="select-none m-2 p-4 bg-gray-100 rounded-lg flex items-center justify-between
            shadow">
  <div class="flex no-wrap items-center">
    <div class="">
      <p class="line-clamp-1 p-1"><a href="{{ route('projects.edit', $project) }}">{{ $project->name }}</a></p>
    </div>
  </div>
  <div class="font-semibold text-sm space-x-2 flex no-wrap">
    <a href="{{ route('projects.edit', $project) }}" class="bg-cyan-500 text-white rounded-md px-4 py-1.5">Edit</a>
    <form action="{{ route('projects.destroy', $project) }}" method="POST">
      @csrf
      @method('DELETE')
      <button class="bg-red-500 text-white rounded-md px-4 py-1.5">Delete</button>
    </form>
  </div>
</li>
