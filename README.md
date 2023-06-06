<div align="center">
  <img src="app/public/img/icons/2.png" width="66" height="56" alt="SPA">
</div>

# Education portal

## Contents

* [Status](#status)
* [About](#about)
* [Installation and launch](#installation)
    * [In the root](#root)
    * [Inside the Docker](#docker)

<hr>

### Status <a name="status"></a>

|               Options               |      Value       |
|:-----------------------------------:|:----------------:|
|      **Project ready Status**       | _Not full ready_ |
|       **Development status**        |    _On pause_    |
| **Interest in further development** |      _low_       |

<hr>

### About application <a name="about"></a>

// TODO
<hr>

### The algorithm for running: <a name="installation"></a>

Docker and Docker-compose are required to run

#### In the root folder <a name="root"></a>

1. Duplicate «.env.example» and rename to «.env»

```
cp .env.example .env
```

2. Specify a free port for «MYSQL» and «APACHE2», or leave the one that has already been installed

3. Git config core file mode must be false

```
git config core.filemode false
```

4. Launch Docker-compose

```
docker-compose up --build -d
```

5. Wait for composer to finish working (the «autoload» file will appear in the «vendor» folder)

6. Grant rights for convenience in the root of the project

```
sudo chmod -R 777 *
```

7. Go to the «app» folder in order to duplicate «.env.example» and rename it to «.env» This «.env» file is an
   environment variable file for the application itself

```
cp .env.example .env
```

8. In the root folder of the project, you need to go inside Docker for further configuration

```
docker-compose exec web bash
```

#### Inside the Docker <a name="docker"></a>

9. Generate an application key and do everything below this:

```
php artisan key:generate
```

10. Start the migration process and seeder

```
php artisan migrate --seed
```

11. Clear the trash

```
php artisan optimize
```

12. Clear the trash

```
php artisan config:clear
```

13. To create a symbolic link, you can use the command

```
php artisan storage:link
```

14. Completely restart Docker

```
docker-compose down && docker-compose up --build -d
```

<hr>

### Ready to start
