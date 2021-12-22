## About instantapp

Cas d'utilisation de fonctionnalités en temps réel avec Laravel 8

- laravel
- livewire
- laravel-Websockets
- pusher-php-serve
- laravel-echo
- alpinejs

## Installation

    - Ajouter la clé SSH du serveur [ $ cat /home/{username}/.ssh/id_rsa.pub ] sur https://gitlab.com/profile/keys
    - $ git clone git@gitlab.com:karmickoala/instantapp.git mynextproject
    - $ cd mynextproject
    - $ composer install    
    - Copier le fichier .env.example en fichier .env
    - $ sudo chmod -R 755 mynextproject
    - $ sudo chmod -R 777 mynextproject/storage
    - $ sudo chmod -R 777 mynextproject/bootstrap/cache
    - $ php artisan key:generate
    - Créer une base de données et éditer le fichier .env en renseignant DB_DATABASE,DB_USERNAME et DB_PASSWORD
    - Migrer les tables $ php artisan migrate
    - Alimenter les tables $ php artisan db:seed 
    - Configurer le Vhost

        $ sudo nano /etc/hosts
        1270.0.1    mydomainename.local

        $ sudo nano /etc/apache2/site-available/mydomainename.local.conf
        <VirtualHost *:80>
            DocumentRoot "/var/www/html/laravel-website/mydomainename.local/public"
            ServerName mydomainename.local
            <Directory /var/www/html/laravel-website/mydomainename.local/public>
                    AllowOverride All
                    Order Allow,Deny
                    Allow from all
            </Directory>
            ErrorLog ${APACHE_LOG_DIR}/mydomainename.local.error.log
            CustomLog ${APACHE_LOG_DIR}/mydomainename.local.access.log combined
        </VirtualHost> 

        $ sudo a2ensite mydomainename.local.conf
        $ sudo systemctl reload apache2

        Editer le fichier hosts de la machine hôte si besoin:
        $ sudo nano /etc/hosts
        {ip_machine}    mydomainename.local

        Enfin, éditer le fichier .env en renseignant :
        (Générer les pusher crédential)
            APP_NAME="Application name ..."
            APP_URL=mydomainename.local
            BROADCAST_DRIVER=pusher
            PUSHER_APP_ID=YOUR_OWN_PUSHERAPP_ID
            PUSHER_APP_KEY=YOUR_OWN_PUSHERAPP_KEY
            PUSHER_APP_SECRET=YOUR_OWN_PUSHERAPP_SECRET

    - Créer lien symbolique storage
        $ php artisan storage:link

    - Installer les dépendances 
        $ npm install && npm run dev
        
## 1ère utilisation

    - Lancer le serveur web socket 
        $ cd mynextproject
        $ php artisan websockets:serve

    - Pour visualiser info dashboard websockets
        http://mydomain.local/laravel-websockets ( désactivé en production via ./routes/web.php)


