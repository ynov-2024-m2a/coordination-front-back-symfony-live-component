[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/v_1A_eqe)
[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-2e0aaae1b6195c2367325f4f02e2d04e9abb55f0b24a779b69b11b9e10269abc.svg)](https://classroom.github.com/online_ide?assignment_repo_id=16555715&assignment_repo_type=AssignmentRepo)

# Installation du projet

## Prérequis

- [Docker](https://docs.docker.com/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Composer](https://getcomposer.org/download/)
- [PHP](https://www.php.net/downloads) (version 8.1 minimum)

## Installation

1. Cloner le projet avec la commande `git clone url_du_projet` et bien se placer dans le dossier du projet avec la commande `cd nom_du_projet` (`pull` si déjà cloné)
2. Installer les dépendances PHP avec Composer avec la commande `composer install`

## Lancer le projet

1. Lancer les containers Docker avec la commande `docker-compose up -d`

2. Créer la base de données avec la commande `php bin/console doctrine:create:database`

2. Jouer la migration avec commande `php bin/console doctrine:migrations:migrate`

3. Installer les fixtures avec la commande `php bin/console doctrine:fixtures:load`

4. Lancer le serveur de développement local avec la commande `symfony serve`

5. Ouvrir le navigateur à l'adresse `http://localhost:8000`

## Structure du projet
### Frontend
- `assets/` : fichiers CSS, JS(pour les controlleurs de l'AssetMapper de Symfony), images, etc.

- `templates/` : fichiers Twig de l'application

  - `base.html.twig` : template de base de l'application

  - `landing/` : page d'accueil


### Backend
- `src/` : code source de l'application

  - `Chart/` : classes de graphiques

  - `Command/` : commandes Symfony

  - `Controller/` : controlleurs de l'application

  - `Entity/` : entités de la base de données

  - `Form/` : formulaires de l'application

  - `Map/` : classes pour la gestion des cartes

  - `Message/` : classes de messages

  - `Repository/` : classes de requêtes personnalisées

  - `Service/` : classes de services

  - `Twig/` : extensions Twig et des composants
