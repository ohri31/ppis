<h3>Instalacija:</h3>
<ul>
    <li>Install xampp (PHP > 7.1, MySql) + Composer</li>
    <li>Pull the project from Github</li>
    <li>Edit the .env.example (or just create .env file)</lI>
    <li>Create database and export the Sql dump</li>
    <li><code>composer install</code></li>
    <li><code>php artisan key:generate</code></li>
    <li><code>php artisan migrate</code></li>
    <li><code>php artisan cache:clear</code></li>
</ul>