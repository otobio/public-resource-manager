Public Resource Drive is a resource manager. 

## Table of Contents
- [!Logo](#)
  - [Table of Contents](#table-of-contents)
  - [Screenshot](#screenshot)
  - [Built with](#built-with)
  - [Local Setup](#setup)

## Screenshot
See the screenshot below:
![image](https://user-images.githubusercontent.com/40448868/134767089-d4459886-e6bd-4953-a6a0-7deef2ebbb1c.png)


## Built with
* Frontend: [Vue.js](https://vuejs.org/) + [Vuex](https://vuex.vuejs.org/)
* Backend: [Laravel](https://www.laravel.com/)

## Setup
You will need
* PHP >=7.4 or newer
* Mysql
* Node.js >=12 or newer
* composer
* npm or yarn

Steps
- Rename .env.example to .env and update the DB_* environment variables per your system
- `composer install`
- `php artisan migrate`
- `php artisan key:generate`
- `npm install`
- Compile JS and Scss files with `npm run dev`
- Run development server with `php artisan serve` 
- Navigate to the address in the last command and enjoy

Pages
- Home or Guest `/`
- Admin `/admin`
