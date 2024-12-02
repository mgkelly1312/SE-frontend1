# Laravel 10 Vue 3 CRUD Activity

## For our mentors

We did not use the composition api as demonstrated in the tutorial. We used [inertia.js](https://inertiajs.com/) because it was easier to implement and I found a [playlist](https://www.youtube.com/playlist?list=PLdXLsjL7A9k3HRt6baScpwggCgQYTRZrx) by the same creator of the other tutorial.

## For my groupmates

**Requirements:**

- [Node JS](https://nodejs.org/en)
- [Composer](https://getcomposer.org/download/)
- [XAMPP](https://www.apachefriends.org/download.html) or any MySQL Client
- [Git](https://git-scm.com/downloads)
- [VSCode](https://code.visualstudio.com/Download) or your IDE of choice

**Steps:**

Clone this repo

`git clone https://github.com/marckoxx/LaraVueAct`

`cd LaraVueAct`

`cp ./.env.example .env`

`composer install`

`npm install`

`php artisan key:generate`

`php artisan migrate`

> --seed option will be added later

`npm run dev`

On a separate terminal:

If you're using vscode:

`code .`

Otherwise open the folder in your IDE and proceed.

`php artisan serve`

You should be able to access the project in your browser now.

### Todo:

- ~~Basic CRUD for each table~~
- Database Seeders for sample entries
- Overview table for the index page
- Student/Professor dropdown list
- Barangay dropdown list
- Permanent/Present Addresses choice
- Front-end design
