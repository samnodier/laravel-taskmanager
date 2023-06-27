<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
    rel="stylesheet">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          inter: ["Inter", "san-serif"],
        },
      }
    }
  </script>

</head>

<body class="antialiased">
  <header class="py-7 bg-cyan-500 fixed w-full z-20 top-0 left-0">
    <h1 class="text-center text-3xl font-bold text-white"><a href="/">Task Manager</a></h1>
  </header>
  <main class="mt-28">
    <div class="px-10 mb-5 p-5 ml-2 text-cyan-600 space-x-5">
      <a class="hover:underline" href="{{ route('tasks.index') }}">Tasks</a>
      <a class="hover:underline" href="{{ route('projects.index') }}">Projects</a>
    </div>
    {{ $slot }}
  </main>
  <footer class="py-10 bg-cyan-500 text-center">
    <p>&copy; {{ date('Y') }} Laravel Task Manager 2023</p>
  </footer>


  <script>
    $(function() {
      $("#sortable").sortable({
        update: function(event, ui) {
          // Use sortable function to sort the tasks
          // Reference: https://api.jqueryui.com/sortable/#method-toArray
          var tasksOrder = $(this).sortable("toArray", {
            attribute: 'id'
          });
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.post("{{ route('tasks.reorder') }}", {
            tasks: tasksOrder
          }, function(data) {
            // console.log(data.html);
            // Clear the container
            $("#sortable").empty()
            // Append new Data
            $("#sortable").append(data.html);
            // displayTasks(data.html);
          });
        }
      });
    });
  </script>
</body>

</html>
