[![Typing SVG](https://readme-typing-svg.herokuapp.com?color=%56025c&lines=SanyaDiplom+almost+ready)](https://vk.com/lampanon)
---------------------------------------
## Что установить?
---------------------------------------
1. Установка гит
> sudo apt install git
---------------------------------------
2. Ключ для гит
> ssh-keygen -t rsa
2. Ключ для гит
> cat ~/.ssh/id_rsa.pub
---------------------------------------
3. Апач сервер
> sudo apt update
3. Апач сервер
> sudo apt install apache2
3. Апач сервер
> sudo ufw app list
3. Апач сервер
> sudo ufw allow in "Apache"
---------------------------------------
4. Мускул
> sudo apt install mysql-server
---------------------------------------
5. Пыха
> sudo apt install php libapache2-mod-php php-mysql
---------------------------------------
6. Копмозер
> curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
---------------------------------------
7. Докер
> sudo apt update
7. Докер
> sudo apt install apt-transport-https ca-certificates curl software-properties-common
7. Докер
> curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
7. Докер
> sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
7. Докер
> sudo apt update
7. Докер
> apt-cache policy docker-ce
7. Докер
> sudo apt install docker-ce
7. Докер
> sudo usermod -aG docker ${USER}
7. Докер
> su - ${USER}
---------------------------------------
8. Докер компоуз
> sudo curl -L "https://github.com/docker/compose/releases/download/1.27.4/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
8. Докер компоуз
> sudo chmod +x /usr/local/bin/docker-compose
---------------------------------------
## Как запустить?
---------------------------------------
1. Скопировать файл окружения для докер:
> cp .env.example .env
2. Указать свои порты, если надо
3. Запретить гиту отслеживать права:
> git config core.filemode false
4. Сбилдить/запустить докер:
> docker-compose up --build -d
5. Ждать пока композер не отработает своё (в папке vendor должен появиться autoload)
6. Выдать права в корне проекта:
> sudo chmod -R 777 *
7. Скопировать файл окружения для проекта, и засунуть в него настройки для почты:
> cp .env.example .env
8. Залезть внутрь web:
> docker-compose exec web bash
9. Создать ключ для приложения:
> php artisan key:generate
10. Создать ключ для jwt:
> php artisan jwt:secret
11. Запустить миграции и сидеры:
> php artisan migrate --seed
12. Запустить фейк сидеры, по желанию:
> php artisan db:fake
13. Чистим конфиги:
> php artisan config:clear
14. Выйти из web и полностью перезапустить докер:
> docker-compose down && docker-compose up --build -d
