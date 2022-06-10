# Data dictionary

### Table establishment

| Champ                  | Type           | Spécifités              | Description                        |
| ---------------------- | -------------- | ----------------------- | ---------------------------------- |
| `id`                   | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Establishment id                   |
| `name`                 | `VARCHAR(100)` | `NOT NULL`              | Establishment name                 |
| `type`                 | `ENUM`         | `NOT NULL`              | Establishment type                 |
| `description`          | `TINYTEXT`     | `NOT NULL`              | Establishment description          |
| `address`              | `VARCHAR(200)` | `NOT NULL`              | Establishment address              |
| `picture`              | `VARCHAR(250)` | `NOT NULL`              | Establishment picture              |
| `price`                | `INT(4)`       | `NULL`                  | Establishment price                |
| `opening_days`         | `TEXT`         | `NULL`                  | Establishment opening days         |
| `noon_opening_time`    | `TEXT`         | `NULL`                  | Establishment noon opening time    |
| `evening_opening_time` | `TEXT`         | `NULL`                  | Establishment evening opening time |
| `website`              | `VARCHAR(255)` | `NULL`                  | Establishment website              |
| `phone`                | `INT(11)`      | `NULL`                  | Establishment phone                |
| `rating`               | `DECIMAL(2,1)` | `NULL`                  | Establishment rating               |
| `slug`                 | `VARCHAR(255)` | `NULL`                  | Establishment slug                 |



### Table District

| Champ  | Type           | Spécifités              | Description   |
| ------ | -------------- | ----------------------- | ------------- |
| `id`   | `INT(11)`      | `PRIMARY KEY, NOT NULL` | District Id   |
| `name` | `VARCHAR(100)` | `NOT NULL`              | District name |



### Table Tag

| Champ  | Type           | Spécifités              | Description |
| ------ | -------------- | ----------------------- | ----------- |
| `id`   | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Tag Id      |
| `name` | `VARCHAR(100)` | `NOT NULL`              | Tag name    |



### Table Comment

| Champ      | Type           | Spécifités              | Description      |
| ---------- | -------------- | ----------------------- | ---------------- |
| `id`       | `INT(11)`      | `PRIMARY KEY, NOT NULL` | Comment Id       |
| `username` | `VARCHAR(100)` | `NOT NULL`              | Comment username |
| `date`     | `DATE`         | `NOT NULL`              | Comment date     |
| `content`  | `TINYTEXT`     | `NOT NULL`              | Comment content  |
| `rating`   | `DECIMAL(2,1)` | `NULL`                  | Comment rating   |
| `picture`  | `VARCHAR(255)` | `NULL`                  | Comment picture  |



### Table User

| Champ         | Type           | Spécifités              | Description      |
| ------------- | -------------- | ----------------------- | ---------------- |
| `id`          | `INT(11)`      | `PRIMARY KEY, NOT NULL` | User Id          |
| `email`       | `VARCHAR(180)` | `NOT NULL`              | User email       |
| `password`    | `VARCHAR(255)` | `NOT NULL`              | User passeword   |
| `username`    | `VARCHAR(100)` | `NOT NULL`              | User username    |
| `lastname`    | `VARCHAR(100)` | `NULL`                  | User lastname    |
| `firstname`   | `VARCHAR(100)` | `NULL`                  | User firstname   |
| `birthdate`   | `DATE`         | `NULL`                  | User birthday    |
| `nationality` | `VARCHAR(100)` | `NULL`                  | User nationality |
| `picture`     | `VARCHAR(255)` | `NULL`                  | User picture     |
| `role`        | `VARCHAR(100)` | `NOT NULL`              | User role        |
