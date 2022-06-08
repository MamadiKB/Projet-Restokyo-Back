# Routes de l'application

## Front

| URL                                 | Méthode HTTP | Contrôleur                | Méthode          | Titre HTML                             | Commentaire                    |
| ----------------------------------- | ------------ | ------------------------- | ---------------- | -------------------------------------- | ------------------------------ |
| `/`                                 | `GET`        | `MainController`          | `home`           | Bienvenue sur ResTokyo                 | Page d'accueil                 |
| `/establishment/restaurant/list`    | `GET`        | `EstablishmentController` | `restaurantList` | Liste des restaurants                  | -                              |
| `/establishment/restaurant/{slug}`  | `GET`        | `EstablishmentController` | `restaurantShow` | {Nom de l'établissement}               | Fiche détail du restaurant     |
| `/establishment/izakaya/list`       | `GET`        | `EstablishmentController` | `barList`        | Liste des bars/izakayas                | -                              |
| `/establishment/izakaya/{slug}`     | `GET`        | `EstablishmentController` | `barShow`        | {Nom de l'établissement}               | Fiche détail du bar/izakaya    |
| `/establishment/popular/list`       | `GET`        | `EstablishmentController` | `popularList`    | Liste des restaurants populaires       | -                              |
| `/establishment/new`                | `POST`       | `EstablishmentController` | `add`            | Proposer un établissement              | -                              |
| `/food/type/list`                   | `GET`        | `FoodController`          | `list`           | {Nom du type de nourriture}            | -                              |
| `/district/{slug}`                  | `GET`        | `DistrictController`      | `districtList`   | Etablissements dans le quartier {name} | Liste par quartier             |
| `/establishment/tag/{slug}`         | `GET`        | `EstablishmentController` | `listByTag`      | {Nom du tag}                           | -                              |
| `/establishment/search`             | `GET`        | `EstablishmentController` | `listByTag`      | {Nom du tag}                           | -                              |
| `/establishment/tag/{slug}`         | `GET`        | `EstablishmentController` | `search`         | Résultats de recherche                 | Recherche selon "quoi" et "où" |
| `/login`                            | `POST`       | `UserController`          | `login`          | Page de connexion                      | -                              |
| `/signin`                           | `POST`       | `UserController`          | `signin`         | Page d'inscription                     | -                              |
| `/profile`                          | `GET`        | `UserController`          | `profile`        | Page de profil                         | -                              |
| `/profile/edit`                     | `POST`       | `UserController`          | `edit`           | Editer le profil                       | -                              |
| `/logout`                           | `GET`        | `UserController`          | `logout`         | Bienvenue sur ResTokyo                 | Renvoie sur la page d'accueil  |
| `/favorites`                        | `GET/POST`   | `FavoritesController`     | `list`           | Liste & suppressions des favoris       | -                              |
| `/favorites/add`                    | `POST`       | `FavoritesController`     | `add`            | Ajouter aux favoris                    | -                              |
| `/comments/list`                    | `GET`        | `CommentController`       | `list`           | Derniers commentaires postés           | -                              |
| `/establishment/{slug}/comment/add` | `POST`       | `CommentController`       | `add`            | Laisser un commentaire                 | -                              |
| `/contact`                          | `POST`       | `MainController`          | `contact`        | Nous contacter                         | -                              |
| `/legale-mentions`                  | `GET`        | `MainController`          | `legaleMentions` | Mentions légales                       | -                              |
| `/site-plan`                        | `GET`        | `MainController`          | `sitePlan`       | Plan du site                           | -                              |



## Front

| URL                                            | Méthode HTTP | Contrôleur                    | Méthode                | Titre HTML                          | Commentaire                   |
| ---------------------------------------------- | ------------ | ----------------------------- | ---------------------- | ----------------------------------- | ----------------------------- |
| `/back`                                        | `GET`        | `BackMainController`          | `home`                 | Bienvenue dans l'arrière boutique   | Page d'accueil du back-office |
| `/back/establishment/restaurant/list`          | `GET`        | `BackEstablishmentController` | `restaurantList`       | Liste des restaurants               | -                             |
| `/back/establishment/restaurant/{slug}`        | `GET`        | `BackEstablishmentController` | `restaurantShow`       | {Nom de l'établissement}            | -                             |
| `/back/establishment/restaurant/add`           | `POST`       | `BackEstablishmentController` | `restaurantAdd`        | Ajout d'un restaurant               | -                             |
| `/back/establishment/restaurant/{slug}/edit`   | `POST`       | `BackEstablishmentController` | `restaurantEdit`       | Édition de {Nom de l'établissement} | -                             |
| `/back/establishment/restaurant/{slug}/delete` | `POST`       | `BackEstablishmentController` | `restaurantDelete`     | -                                   | -                             |
| `/back/establishment/izakaya/list`             | `GET`        | `BackEstablishmentController` | `barList`              | Liste des izakayas                  | -                             |
| `/back/establishment/izakaya/{slug}`           | `GET`        | `BackEstablishmentController` | `barShow`              | {Nom de l'établissement}            | -                             |
| `/back/establishment/izakaya/add`              | `POST`       | `BackEstablishmentController` | `barAdd`               | Ajout d'un izakaya                  | -                             |
| `/back/establishment/izakaya/{slug}/edit`      | `POST`       | `BackEstablishmentController` | `barEdit`              | Édition de {Nom de l'établissement} | -                             |
| `/back/establishment/izakaya/{slug}/delete`    | `POST`       | `BackEstablishmentController` | `barDelete`            | -                                   | -                             |
| `/back/establishment/new/list`                 | `GET`        | `BackEstablishmentController` | `newEstablishmentList` | Liste des établissements proposés   | -                             |
| `/back/establishment/new/list/{id}`            | `GET`        | `BackEstablishmentController` | `newEstablishmentNew`  | Établissement proposé numéro {id}   | Récupération du formulaire    |
| `/back/district/list`                          | `GET`        | `BackDistrictController`      | `districtList`         | Liste des quartiers                 | -                             |
| `/back/district/list/{slug}`                   | `GET`        | `BackDistrictController`      | `districtShow`         | {Nom du quartier}                   | Fiche détail du quartier      |
| `/back/district/add`                           | `POST`       | `BackDistrictController`      | `districtAdd`          | Ajout d'un quartier                 | -                             |
| `/back/district/{slug}/edit`                   | `POST`       | `BackDistrictController`      | `districtEdit`         | Édition de {Nom du quartier}        | -                             |
| `/back/district/{slug}/delete`                 | `POST`       | `BackDistrictController`      | `districtDelete`       | -                                   | -                             |
| `/back/profile/list`                           | `GET`        | `BackDistrictController`      | `districtList`         | Liste des utilisateurs              | -                             |
| `/back/profile/list/{slug}`                    | `GET`        | `BackUserController`          | `profileShow`          | {Nom de l'utilisateur}              | Fiche détail de l'utilisateur |
| `/back/profile/add`                            | `POST`       | `BackUserController`          | `profileAdd`           | Ajout d'un utilisateur              | -                             |
| `/back/profile/{slug}/edit`                    | `POST`       | `BackUserController`          | `profileEdit`          | Édition de {Nom de l'utilisateur}   | -                             |
| `/back/profile/{slug}/delete`                  | `POST`       | `BackUserController`          | `profileDelete`        | -                                   | -                             |
