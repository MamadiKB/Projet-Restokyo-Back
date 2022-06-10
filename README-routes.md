# App road

## Front

| URL                                           | Méthode HTTP | Contrôleur                      | Méthode          | Titre HTML                             | Commentaire                                                |
| --------------------------------------------- | ------------ | ------------------------------- | ---------------- | -------------------------------------- | ---------------------------------------------------------- |
| `/`                                           | `GET`        | `Front/MainController`          | `home`           | Bienvenue sur ResTokyo                 | Home page                                                  |
| `/etablissements/{type}/liste`                | `GET`        | `Front/EstablishmentController` | `list`           | Liste des restaurants                  | Showing list of etablishments depending on type selected   |
| `//etablissements/{type}/{slug}`              | `GET`        | `Front/EstablishmentController` | `show`           | {Nom de l'établissement}               | Etablishment page                                          |
| `/etablissements/populaires/liste`            | `GET`        | `Front/EstablishmentController` | `barList`        | Liste des bars/izakayas                | Popular establishments list (best ranking)                 |
| `/etablissements/ajouter`                     | `POST`       | `Front/EstablishmentController` | `add`            | Proposer un établissement              | Page to add an establishment                               |
| `/nourriture/{slug}`                          | `GET`        | `Front/FoodController`          | `list`           | {Nom du type de nourriture}            | List depending on food type (fast-food, traditional, etc.) |
| `/quartier/{slug}`                            | `GET`        | `Front/DistrictController`      | `list`           | Etablissements dans le quartier {name} | List by district                                           |
| `/etablissements/{tagslug}`                   | `GET`        | `Front/EstablishmentController` | `listByTag`      | {Nom du tag}                           | Sort by tag                                                |
| `/etablissements/resultats`                   | `GET`        | `Front/EstablishmentController` | `search`         | Résultats de recherche                 | Search results                                             |
| `/connexion`                                  | `POST`       | `Front/UserController`          | `login`          | Page de connexion                      | Login page                                                 |
| `/inscription`                                | `POST`       | `Front/UserController`          | `signin`         | Page d'inscription                     | Inscription page                                           |
| `/profil`                                     | `GET`        | `Front/UserController`          | `profile`        | Page de profil                         | User profile page                                          |
| `/profil/editer`                              | `POST`       | `Front/UserController`          | `edit`           | Editer le profil                       | User profile edition                                       |
| `/deconnexion`                                | `GET`        | `Front/UserController`          | `logout`         | Bienvenue sur ResTokyo                 | Send back to home page                                     |
| `/ma-liste`                                   | `POST`       | `Front/FavoritesController`     | `list`           | Suppressions des favoris               | User’s list of establishments                              |
| `/ma-liste/ajouter`                           | `POST`       | `Front/FavoritesController`     | `add`            | Ajouter aux favoris                    | To add to fav list                                         |
| `/commentaires/liste`                         | `GET`        | `Front/CommentController`       | `list`           | Derniers commentaires postés           | List of comments ordered by ASC                            |
| `/etablissements/{slug}/commentaires/ajouter` | `POST`       | `Front/CommentController`       | `add`            | Laisser un commentaire                 | To add a review on an establishment’s page                 |
| `/contact`                                    | `POST`       | `Front/MainController`          | `contact`        | Nous contacter                         | Contact page                                               |
| `/mentions-legales`                           | `GET`        | `Front/MainController`          | `legaleMentions` | Mentions légales                       | Legales mentions page                                      |
| `/plan-du-site`                               | `GET`        | `Front/MainController`          | `sitePlan`       | Plan du site                           | Site plan page                                             |



## Back

| URL                                            | Méthode HTTP | Contrôleur                     | Méthode                | Titre HTML                          | Commentaire                          |
| ---------------------------------------------- | ------------ | ------------------------------ | ---------------------- | ----------------------------------- | ------------------------------------ |
| `/back`                                        | `GET`        | `Back/MainController`          | `home`                 | Bienvenue dans l'arrière boutique   | Back home page                       |
| `/back/etablissements/{type}`                  | `GET`        | `Back/EstablishmentController` | `listByType`           | Liste des établissements            | Establishments list by type          |
| `/back/etablissements/{type}/{slug}`           | `GET`        | `Back/EstablishmentController` | `show`                 | {Nom de l'établissement}            | Establishment’s page                 |
| `/back/etablissements/{type}/ajouter`          | `POST`       | `Back/EstablishmentController` | `add`                  | Ajout d'un établissement            | Page to add an establishment by type |
| `/back/etablissements/{type]/{slug}/editer`    | `POST`       | `Back/EstablishmentController` | `edit`                 | Édition de {Nom de l'établissement} | Edit establishment by type           |
| `/back/etablissements/{type}/{slug}/supprimer` | `POST`       | `Back/EstablishmentController` | `delete`               | -                                   | Delete establishment                 |
| `/back/etablissements/nouveau/liste`           | `GET`        | `Back/EstablishmentController` | `newEstablishmentList` | Liste des établissements proposés   | list of  proposed establishments     |
| `/back/etablissements/nouveau/liste/{id}`      | `GET`        | `Back/EstablishmentController` | `handleProposition`    | Établissement proposé numéro {id}   | Establishment recovery               |
| `/back/specialites/liste`                      | `GET`        | `Back/EstablishmentController` | `list`                 | Liste des spécialités               | Speciality list                      |
| `/back/specialites/{slug}`                     | `GET`        | `Back/EstablishmentController` | `show`                 | {Nom de la spécialité}              | Speciality's page                    |
| `/back/specialites/ajouter`                    | `POST`       | `Back/EstablishmentController` | `add`                  | Ajout d'une spécialité              | Page to ass a speciality             |
| `/back/specialites/{slug}/editer`              | `POST`       | `Back/EstablishmentController` | `edit`                 | Édition d'une spécialité            | Edit speciality                      |
| `/back/specialites/{slug}/supprimer`           | `POST`       | `Back/EstablishmentController` | `delete`               | -                                   | Delete speciality                    |
| `/back/quartiers/liste`                        | `GET`        | `Back/DistrictController`      | `list`                 | Liste des quartiers                 | District list                        |
| `/back/quartiers/{slug}`                       | `GET`        | `Back/DistrictController`      | `Show`                 | {Nom du quartier}                   | District's page                      |
| `/back/quartiers/ajouter`                      | `POST`       | `Back/DistrictController`      | `add`                  | Ajout d'un quartier                 | Page to add an district              |
| `/back/quartiers/{slug}/editer`                | `POST`       | `Back/DistrictController`      | `edit`                 | Édition de {Nom du quartier}        | Edit district                        |
| `/back/quartiers/{slug}/supprimer`             | `POST`       | `Back/DistrictController`      | `delete`               | -                                   | Delete district                      |
| `/back/profils/liste`                          | `GET`        | `Back/UserController`          | `list`                 | Liste des utilisateurs              | List of users                        |
| `/back/profils/{slug}`                         | `GET`        | `Back/UserController`          | `show`                 | {Nom de l'utilisateur}              | User's page                          |
| `/back/profils/ajouter`                        | `POST`       | `Back/UserController`          | `add`                  | Ajout d'un utilisateur              | Add a user                           |
| `/back/profils/{slug}/editer`                  | `POST`       | `Back/UserController`          | `edit`                 | Édition de {Nom de l'utilisateur}   | Edit user                            |
| `/back/profils/{slug}/delete`                  | `POST`       | `Back/UserController`          | `delete`               | -                                   | Delete user                          |



## API

| URL                                  | Méthode HTTP | Contrôleur                    | Méthode                       | Titre HTML | Commentaire                        |
| ------------------------------------ | ------------ | ----------------------------- | ----------------------------- | ---------- | ---------------------------------- |
| `/api/v1/etablissements`             | `GET`        | `Api/EstablishmentController` | `establishmentsGetList`       | -          | Establishments list                |
| `/api/v1/etablissements/{type}`      | `GET`        | `Api/EstablishmentController` | `establishmentsGetListByType` | -          | Establishments list by type        |
| `/api/v1/etablissements/{type}/{id}` | `GET`        | `Api/EstablishmentController` | `establishmentsGetItem`       | -          | Recovery of an establishment by id |
| `/api/v1/etablissements/ajouter`     | `GET`        | `Api/EstablishmentController` | `establishmentsPostItem`      | -          | To go to the proposition form      |
| `/api/v1/etablissements/ajouter`     | `POST`       | `Api/EstablishmentController` | `establishmentsPostItem`      | -          | To propose an establishement       |
| `/api/v1/tags`                       | `GET`        | `Api/TagController`           | `tagGetList`                  | -          | Tags list                          |
| `/api/v1/tags/{id}`                  | `GET`        | `Api/TagController`           | `establishmentsByTag`         | -          | List of establishments by tag      |
| `/api/v1/districts`                  | `GET`        | `Api/DistrictController`      | `districtGetList`             | -          | Districts list                     |
| `/api/v1/districts/{id}`             | `GET`        | `Api/DistrictController`      | `establishmentsByDistrict`    | -          | List of establishments by district |
| `/api/v1/profils/ajouter`            | `POST`       | `Api/UserController`          | `userPostlist`                | -          | Create a new user                  |
| `/api/v1/profils/{id}`               | `GET`        | `Api/UserController`          | `userGetItem`                 | -          | Recovery of a user by id           |
| `/api/v1/profils/{id}`               | `PUT`        | `Api/UserController`          | `userPutItem`                 | -          | Edit a user by id                  |
| `/api/v1/profils/{id}`               | `DELETE`     | `Api/UserController`          | `userDeleteItem`              | -          | Delete an user by id                |
| `/api/v1/connexion`                  | `POST`       | `Api/SecurityController`      | `login`                       | -          | Connection of an user              |
