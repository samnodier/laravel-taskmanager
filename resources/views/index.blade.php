<x-app-layout>
  <section class="px-10">
    <div class="grid">
      <a href="{{ route('tasks.create') }}"
        class="bg-cyan-500 py-1.5 px-4 rounded-md text-white justify-self-end m-2">Create
        Task</a>
    </div>
    <div class="py-10">
      <ul id="sortable">
        @foreach ($tasks as $task)
          <x-task :task="$task" />
        @endforeach
        {{-- <li class="m-2 p-4 bg-gray-100 rounded-lg flex items-center justify-between shadow">
          <div>
            <p class="line-clamp-1 p-1">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p class="text-xs text-gray-500">June 23, 2023 08:35</p>
          </div>
          <div class="font-semibold text-sm space-x-2 flex no-wrap">
            <button class="bg-cyan-500 text-white rounded-md px-4 py-1.5">Done</button>
            <button class="bg-red-500 text-white rounded-md px-4 py-1.5">Delete</button>
          </div>
        </li> --}}
      </ul>
    </div>
  </section>
</x-app-layout>
