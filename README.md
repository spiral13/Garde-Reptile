# Repti-garde

Comment récuperer le projet:

- Cloner
- Faire composer install 
    Config =
              database_host :
              database_port : 
              database_name : repti_garde
              database_user:
              database_password: 
              mailer_transport:
              mailer_host:
              mailer_user:  ICI rentrer un email 
              mailer_password:
              
- !!!!!!!!! Renseigner ABSOLUMENT un mail du user dans la config !!!!!

- Créer la base :    php bin/console doctrine:database:create
- Update de la base :      php bin/console doctrine:schema:update --force
- Lancer le serveur :     php bin/console server:start


# Projet ressources docs ...

- Bootstrap theme Minty.

- Ajout FOSUserBundle
https://www.youtube.com/watch?v=9Stm-Eqzung

- Ajout de EasyAdmin

