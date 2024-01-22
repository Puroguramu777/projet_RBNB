# ligne de commande pour symphony avec docker

# premier lancement de docker compose
docker-compose up --build
# docker compose en mode détaché
docker-compose up --build -d 

# arrêt de docker compose en mode détaché
docker-compose down

# redemarrage du docker compose
docker-compose restart

# création du projet symfony
# avoir le docker compose lancé
# attention d'avoir le dossier app vide
docker exec -it [nom du container php] composer create-project symfony/skeleton ./

# ajout de bundle symfony
docker exec -it [nom du container php] composer req [nom du bundle]

# enlever un bundle 
docker exec -it [nom du container php] composer remove [nom du bundle]

# voir les commandes de bin/console
docker exec -it [nom du container php] php bin/console

# executer le nettoyage du cache de symfony
docker exec -it [nom du container php] php bin/console cache:clear

# afficher les routes du symfony
docker exec -it [nom du container php] php bin/console debug:router

# forcer les droits pour l'utilisateur
# se placer dans le repertoire principale du projet
sudo chown -R [nomUtilisateur ou uid]:[nom du groupe ou gid] app/

# install doctrine
docker exec -it phpbook composer req symfony/orm-pack 

# install  maker bundle
docker exec -it phpbook composer req --dev symfony/maker-bundle

# install bundle asset
docker exec -it phpbook composer req symfony/asset

# install debug bar
docker exec -it phpbook composer req --dev symfony/profiler-pack

# install Fixture
docker exec -it phpbook composer req --dev doctrine/doctrine-fixtures-bundle

# install Faker
docker exec -it phpbook composer req --dev fzaninotto/faker

# suppression de la base
docker exec -it phpbook php bin/console d:d:d -f

# recreation de la BDD
docker exec -it phpbook php bin/console d:d:c

# générer la migration
docker exec -it phpbook php bin/console make:migration

# propager la migration
docker exec -it phpbook php bin/console d:m:m

# lancer les fixtures
docker exec -it phpbook php bin/console d:f:l

# pour les formulaires
docker exec -it phpbook composer req form validator symfony/security-csrf

# process install après clonnage 
1/ git clone https://github.com/lidem-admin-github/PrepaDev_Symfony_bookstore.git

2/ docker-compose up --build

3/ docker exec -it phpbook composer install
