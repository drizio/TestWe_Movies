# TestWe (temps recommandé: 2h00)

TestWe dispose d'une petite application Symfony destinée à visualiser des informations sur des films. Cette application très basique est implémentée en Symfony uniquement (génération des pages côté serveur).

Nos utilisateurs souhaitent une interface plus moderne, développée dans un framework front type React ou Angular. Ils se plaignent également des performances vu le nombre grandissant de films.

Instructions :
En commencant par la page /movie/ et en avançeant autant que possible dans le temps indiqué :

- Mettez en place des APIs REST exposant les données de l'application
- Mettez en place une application React ou Angular affichant ces données de la façon la plus pratique possible pour les utilisateurs

Vu le temps limité, l'objectif n'est bien sûr pas de tout faire. Aucun style particulier n'est demandé pour la partie front, juste quelque chose de fonctionnel. La prise en compte des performances avec un volume élevé de données est importante.

##Étape 1 : Installation

1. Fork le projet
2. Installer les dependances
3. Créez la base de donnée 'test'
4. Créez les tables en ligne de commande ou via le fichier datas/test-cinemahd-database.sql
5. Importez les données situées dans le fichier datas/test-cinemahd-datas.sql

Rendu: Un repository git avec vos modifications.

##Voilà toute la documentation sur l'application actuelle:

####Url Films :

- /movie/
- /movie/new
- /movie/edit/{id}

####Url des personnes :

- /person/
- /person/new
- /person/edit/{id}
- /person/movies/{id}

####Url des salles :

- /room/
- /room/new
- /room/edit/{id}
