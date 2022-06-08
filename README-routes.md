# Routes de l'application

## Front

| URL                                           | Méthode HTTP | Contrôleur                      | Méthode          | Titre HTML                             | Commentaire                    |
| --------------------------------------------- | ------------ | ------------------------------- | ---------------- | -------------------------------------- | ------------------------------ |
| `/`                                           | `GET`        | `Front/MainController`          | `home`           | Bienvenue sur ResTokyo                 | Page d'accueil                 |
| `/etablissements/{type}/liste`                | `GET`        | `Front/EstablishmentController` | `list`           | Liste des restaurants                  | -                              |
| `//etablissements/{type}/{slug}`              | `GET`        | `Front/EstablishmentController` | `show`           | {Nom de l'établissement}               | Fiche détail du restaurant     |
| `/etablissements/populaires/liste`            | `GET`        | `Front/EstablishmentController` | `barList`        | Liste des bars/izakayas                | -                              |
| `/etablissements/izakaya/{slug}`              | `GET`        | `Front/EstablishmentController` | `populairList`   | Liste des restaurants populaires       | -                              |
| `/etablissements/ajouter`                     | `POST`       | `Front/EstablishmentController` | `add`            | Proposer un établissement              | -                              |
| `/nourriture/{slug}`                          | `GET`        | `Front/FoodController`          | `list`           | {Nom du type de nourriture}            | Fast Food VS Tradi             |
| `/quartier/{slug}`                            | `GET`        | `Front/DistrictController`      | `list`           | Etablissements dans le quartier {name} | Liste par quartier             |
| `/etablissements/{tagslug}`                   | `GET`        | `Front/EstablishmentController` | `listByTag`      | {Nom du tag}                           | Tri par tagtag                 |
| `/etablissements/resultats`                   | `GET`        | `Front/EstablishmentController` | `search`         | Résultats de recherche                 | Recherche selon "quoi" et "où" |
| `/connexion`                                  | `POST`       | `Front/UserController`          | `login`          | Page de connexion                      | -                              |
| `/inscription`                                | `POST`       | `Front/UserController`          | `signin`         | Page d'inscription                     | -                              |
| `/profil`                                     | `GET`        | `Front/UserController`          | `profile`        | Page de profil                         | -                              |
| `/profil/editer`                              | `POST`       | `Front/UserController`          | `edit`           | Editer le profil                       | -                              |
| `/deconnexion`                                | `GET`        | `Front/UserController`          | `logout`         | Bienvenue sur ResTokyo                 | Renvoie sur la page d'accueil  |
| `/ma-liste`                                   | `POST`       | `Front/FavoritesController`     | `list`           | Suppressions des favoris               | -                              |
| `/ma-liste/ajouter`                           | `POST`       | `Front/FavoritesController`     | `add`            | Ajouter aux favoris                    | -                              |
| `/commentaires/liste`                         | `GET`        | `Front/CommentController`       | `list`           | Derniers commentaires postés           | -                              |
| `/etablissements/{slug}/commentaires/ajouter` | `POST`       | `Front/CommentController`       | `add`            | Laisser un commentaire                 | -                              |
| `/contact`                                    | `POST`       | `Front/MainController`          | `contact`        | Nous contacter                         | -                              |
| `/mentions-legales`                           | `GET`        | `Front/MainController`          | `legaleMentions` | Mentions légales                       | -                              |
| `/plan-du-site`                               | `GET`        | `Front/MainController`          | `sitePlan`       | Plan du site                           | -                              |



## Back

| URL                                            | Méthode HTTP | Contrôleur                     | Méthode                | Titre HTML                          | Commentaire                   |
| ---------------------------------------------- | ------------ | ------------------------------ | ---------------------- | ----------------------------------- | ----------------------------- |
| `/back`                                        | `GET`        | `Back/MainController`          | `home`                 | Bienvenue dans l'arrière boutique   | Page d'accueil du back-office |
| `/back/etablissements/{type}`                  | `GET`        | `Back/EstablishmentController` | `listByType`           | Liste des établissements            | -                             |
| `/back/etablissements/{type}/{slug}`           | `GET`        | `Back/EstablishmentController` | `show`                 | {Nom de l'établissement}            | -                             |
| `/back/etablissements/{type}/ajouter`          | `POST`       | `Back/EstablishmentController` | `add`                  | Ajout d'un établissement            | -                             |
| `/back/etablissements/{type]/{slug}/editer`    | `POST`       | `Back/EstablishmentController` | `edit`                 | Édition de {Nom de l'établissement} | -                             |
| `/back/etablissements/{type}/{slug}/supprimer` | `POST`       | `Back/EstablishmentController` | `delete`               | -                                   |
| -                                              |
| `/back/etablissements/nouveau/liste`           | `GET`        | `Back/EstablishmentController` | `newEstablishmentList` | Liste des établissements proposés   | -                             |
| `/back/etablissements/nouveau/liste/{id}`      | `GET`        | `Back/EstablishmentController` | `handleProposition`    | Établissement proposé numéro {id}   | Récupération du formulaire    |
| `/back/quartiers/liste`                        | `GET`        | `Back/DistrictController`      | `list`                 | Liste des quartiers                 | -                             |
| `/back/district/list/{slug}`                   | `GET`        | `Back/DistrictController`      | `Show`                 | {Nom du quartier}                   | Fiche détail du quartier      |
| `/back/quartier/ajouter`                       | `POST`       | `Back/DistrictController`      | `add`                  | Ajout d'un quartier                 | -                             |
| `/back/quartier/{slug}/editer`                 | `POST`       | `Back/DistrictController`      | `edit`                 | Édition de {Nom du quartier}        | -                             |
| `/back/quartier/{slug}/supprimer`              | `POST`       | `Back/DistrictController`      | `delete`               | -                                   | -                             |
| `/back/profils/liste`                          | `GET`        | `Back/UserController`          | `list`                 | Liste des utilisateurs              | -                             |
| `/back/profils/{slug}`                         | `GET`        | `Back/UserController`          | `show`                 | {Nom de l'utilisateur}              | Fiche détail de l'utilisateur |
| `/back/profils/ajouter`                        | `POST`       | `Back/UserController`          | `add`                  | Ajout d'un utilisateur              | -                             |
| `/back/profils/{slug}/editer`                  | `POST`       | `Back/UserController`          | `edit`                 | Édition de {Nom de l'utilisateur}   | -                             |
| `/back/profils/{slug}/delete`                  | `POST`       | `Back/UserController`          | `delete`               | -                                   | -                             |



## API

| URL                               | Méthode HTTP | Contrôleur                    | Méthode                  | Titre HTML | Commentaire                              |
| --------------------------------- | ------------ | ----------------------------- | ------------------------ | ---------- | ---------------------------------------- |
| `/api/etablissements/liste`       | `GET`        | `Api/EstablishmentController` | `establishmentsGetList`  | -          | Liste des établissements par type        |
| `/api/etablissements/{type}/{id}` | `GET`        | `Api/EstablishmentController` | `establishmentsGetItem`  | -          | Récupération d'un établissement par type |
| `/api/etablissements/{type}/{id}` | `GET`        | `Api/EstablishmentController` | `establishmentsPostItem` | -          | Création d'un établissement par type     |