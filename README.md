<p align="center"><a style="font-size: 3rem; font-weight: bold; color:white;" href="https://laravel.com" target="_blank">Task Manager</a></p>

## About Task Manager

This is simple application where a user can view, create, edit, arrange, and delete tasks. The tasks have associated projects or the default (All Projects) project and you can view all tasks in all projects or view project specific tasks.

## How to Setup Up Project

1. Install Laravel
2. Run the command below<br>
   `$ laravel new taskmanager`<br>
   `$ cd taskmanager`
3. Create MySQL database and update the `.env` file with the credentials. I am using **Sqlite** in my example.
   `DB_CONNECTION=sqlite`<br>
   `DB_DATABASE=/absolute/path/to/database/taskmanager/database/database.sqlite`<br>
   `DB_FOREIGN_KEYS=true`<br>
4. Run Database migrations to create necessary tables <br>
   `$ php artisan migrate`

5. Generate Task and Project Model and Migration<br>
   `$ php artisan make:model Task --migration`<br>
   `$ php artisan make:model Project --migration`

6. Open the migrations and update with the necessary columns

7. Create the seeder files for Tasks and Projects. <br>
   `$ php artisan make:seeder TaskSeeder`<br>
   `$ php artisan make:seeder ProjectSeeder`

8. Run the migration to create the tables and seed the tables<br>
   `$ php artisan migrate:fresh --seed`

9. Update `web.php` to reflect the routes created using resources<br>
   `Route::resource('tasks', TaskController::class);`
   `Route::resource('projects', TaskController::class);`

10. Build relationship between Task and Project in their Models

11. Update the blade files to show the necessary pages.

12. Add necessary initiators<br>

```<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

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
```

13. Serve your application<br>
    `$ php artisan serve`

## How to Deploy

I am going to demonstrate how to deploy this project to cPanel. There are different pages on the web demostrating how to diploy to GitHub, Netlify, Firebase, and more. Following them would still help with deployin the app.

1. Go the cPanel and select PHP version you want.
2. Connect to the server, I like going to the terminal inside cPanel.
3. Navigate to _public_html_ directory and create a folder named _composer_
4. Install Composer (cPanels don't come with it)
5. Upload the site to the cPanel, you can clone it from GitHub.
6. Go to the project directory and run composer install
7. Configure and migrate your database
8. Configure webserver in cPanel in `public_html/.htaccess`.
9. You should have you site uploaded successfully.

## References

-   Laravel 10.x Documentation https://laravel.com/docs/10.x

-   Install Composer in Namecheap and upload your site https://antonioufano.com/articles/deploy-a-laravel-7-app-to-shared-hosting-namecheap-26/

*   Sortable Widget https://antonioufano.com/articles/deploy-a-laravel-7-app-to-shared-hosting-namecheap-26/
