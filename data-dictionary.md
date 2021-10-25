| Field | Type | Specificity | Description | 
| :----: |:------:|:---------:|:----:|
| id |	INT	| PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |	User's ID |
| username | varchar(128) |	NOT NULL | User's username |
email	varchar(128)	NOT NULL	User's email
role	enum(‘user’,‘catalogue-manager’,’admin’,’super-admin’)	NOT NULL	User's role
password	varchar(60)	NOT NULL	User's password
created_at	timestamp [current_timestamp()]	NOT NULL, DEFAULT CURRENT_TIMESTAMP	User's date of creation
updated_atAligné à gauche  |   ce texte        |  Aligné à droite |
| Aligné à gauche  | est             |   Aligné à droite |
| Aligné à gauche  | centré          |    Aligné à droite |