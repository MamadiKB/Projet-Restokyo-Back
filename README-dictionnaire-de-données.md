# Dictionnaire de données du projet

### Table establishment

| Champ                  | Type           | Spécifités              | Description                                     |
| ---------------------- | -------------- | ----------------------- | ----------------------------------------------- |
| `id`                   | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Identifiant de l'établissement                  |
| `name`                 | `VARCHAR(100)` | `NOT NULL`              | Nom de l'établissement                          |
| `type`                 | `ENUM`         | `NOT NULL`              | Type d'établissement                            |
| `description`          | `TINYTEXT`     | `NOT NULL`              | Description de l'établissement                  |
| `address`              | `VARCHAR(200)` | `NOT NULL`              | Adresse de l'établissement                      |
| `picture`              | `VARCHAR(250)` | `NOT NULL`              | Photo de l'établissement                        |
| `price`                | `INT(4)`       | `NULL`                  | Prix moyen de l'établissement                   |
| `opening_days`         | `TEXT`         | `NULL`                  | Jours d'ouverture de l'établissement            |
| `noon_opening_time`    | `TEXT`         | `NULL`                  | Horaires d'ouverture de l'établissement le midi |
| `evening_opening_time` | `TEXT`         | `NULL`                  | Horaires d'ouverture de l'établissement le soir |
| `website`              | `VARCHAR(255)` | `NULL`                  | Site web de l'établissement                     |
| `phone`                | `INT(11)`      | `NULL`                  | Numéro de téléphone de l'établissement          |
| `rating`               | `DECIMAL(2,1)` | `NULL`                  | Note de l'établissement                         |
| `slug`                 | `VARCHAR(255)` | `NULL`                  | slug de l'établissement                         |



### Table District

| Champ  | Type           | Spécifités              | Description             |
| ------ | -------------- | ----------------------- | ----------------------- |
| `id`   | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Identifiant du quartier |
| `name` | `VARCHAR(100)` | `NOT NULL`              | Nom du quartier         |



### Table Tag

| Champ  | Type           | Spécifités              | Description        |
| ------ | -------------- | ----------------------- | ------------------ |
| `id`   | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Identifiant du tag |
| `name` | `VARCHAR(100)` | `NOT NULL`              | Nom du tag         |



### Table Comment

| Champ      | Type           | Spécifités              | Description                                      |
| ---------- | -------------- | ----------------------- | ------------------------------------------------ |
| `id`       | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Identifiant du commentaire                       |
| `username` | `VARCHAR(100)` | `NOT NULL`              | Surnom de la personne ayant écrit le commentaire |
| `date`     | `DATE`         | `NOT NULL`              | Date de la publication du commentaire            |
| `content`  | `TINYTEXT`     | `NOT NULL`              | Contenu du commentaire                           |
| `rating`   | `DECIMAL(2,1)` | `NULL`                  | Note de la personne ayant écrit le commentaire   |
| `picture`  | `VARCHAR(255)` | `NULL`                  | image inclue avec le commentaire                 |



### Table User

| Champ         | Type           | Spécifités              | Description                          |
| ------------- | -------------- | ----------------------- | ------------------------------------ |
| `id`          | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Identifiant de l'utilisateur         |
| `email`       | `VARCHAR(180)` | `NOT NULL`              | Email de l'utilisateur               |
| `password`    | `VARCHAR(255)` | `NOT NULL`              | Mot de passe de l'utilisateur        |
| `username`    | `VARCHAR(100)` | `NOT NULL`              | Surnom de l'utilisateur              |
| `lastname`    | `VARCHAR(100)` | `NULL`                  | Nom de famille de l'utilisateur      |
| `firstname`   | `VARCHAR(100)` | `NULL`                  | Prènom de l'utilisateur              |
| `birthdate`   | `DATE`         | `NULL`                  | Date d'anniversaire de l'utilisateur |
| `nationality` | `VARCHAR(100)` | `NULL`                  | Nationalité de l'utilisateur         |
| `picture`     | `VARCHAR(255)` | `NULL`                  | Photo de profil de l'utilisateur     |
| `role`        | `VARCHAR(100)` | `NOT NULL`              | Rôle de l'utilisateur                |
