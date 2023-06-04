### The algorithm for running:

1. Duplicate «.env.example» and rename to «.env»
```
cp .env .env.example 
```

2. Specify a free port to follow the link, or leave the one that has already been installed


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
 
7. Go to the «app» folder in order to duplicate «.new.example» and rename it to «.env» This «.env» file is an environment variable file for the application itself
```
cp .env.example .env
```

8. In the root folder of the project, you need to go inside Docker for further configuration
```
docker-compose exec web bash
```

9. Generate an application key and do everything below this:
```
php artisan key:generate
```
```
php artisan optimize
```
```
php artisan migrate
```
```
php artisan db:seed
```
```
php artisan optimize
```
```
php artisan storage:link
```

10. Completely restart Docker 
```
docker-compose down && docker-compose up --build -d
```

### Ready to start
