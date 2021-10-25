# USER 
| Field | Type | Specificity | Description | 
| :---: |:------:|:---------:|:----:|
| id |	INT	| PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |	User's ID |
| username | varchar(128) |	NOT NULL | User's username |
| email | varchar(128) | NOT NULL |	User's email |
| role | enum(‘user’,‘catalogue-manager’,’admin’,’super-admin’) | NOT NULL | User's role |
| password | varchar(60) |	NOT NULL | User's password |
| created_at | timestamp [current_timestamp()] | NOT NULL, DEFAULT CURRENT_TIMESTAMP |User's date of creation |
| updated_at | timestamp | NULL, DEFAULT CURRENT_TIMESTAMP | Date of last  update |


# LIST

| Field | Type | Specificity | Description |
| :----: |:------:|:---------:|:----:|
| id | INT | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT | List's ID |
| series_id | varchar(128) | NULL |	User's last watched series |
| season_id	| INT |	NULL |	User's last watched season |
| episode_id | INT | NULL |	User's last watched episode |
| type |	tinyINT |	NOT NULL |	1 = Already watched, 2 = Watching, 3 = To watch |
| created_at | timestamp | NOT NULL, DEFAULT CURRENT_TIMESTAMP | List's date of creation |
| updated_at | timestamp | NULL, DEFAULT CURRENT_TIMESTAMP | Date of last  update |


# SERIE

| Field | Type | Specificity | Description | 
| :----: |:------:|:---------:|:----:|
| id |	INT |	PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT |	Serie's ID
| title |	varchar(255) |	NOT NULL |	Serie's title |
| synopsis |	longtext |	NOT NULL |	Serie's synopsis |
| release_date |	timestamp |	NULL, DATETIME |	Serie's release date |
| image |	varchar(255) |	NULL | 	Serie's poster |
| director |	varchar(255) |	NOT NULL |	Serie's director |
| number_of_seasons |	INT |	NULL |	Serie's number of seasons |
| created_at |	timestamp |	NOT NULL, DEFAULT CURRENT_TIMESTAMP |	Serie's date of creation |
| updated_at |	timestamp |	NULL, DEFAULT CURRENT_TIMESTAMP |	Date of last update |

# ACTOR

| Field | Type | Specificity | Description | 
| :----: |:------:|:---------:|:----:|
| id |	INT |	PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT | Actor's ID |
| firstname |	varchar(128) |	NOT NULL |	Actor's firstname |
| lastname |	varchar(128) |	NOT NULL |	Actor's lastname |
| image |	varchar(255) |	NULL |	Actor's photo |
| created_at |	timestamp |	NOT NULL, DEFAULT CURRENT_TIMESTAMP |	Actor's date of creation |
| updated_at |	timestamp |	NULL, DEFAULT CURRENT_TIMESTAMP |	Date of last update |

# SEASON

| Field | Type | Specificity | Description | 
| :----: |:------:|:---------:|:----:|		
| id |	INT	| PRIMARY KEY, UNSIGNED, NOT NULL | AUTO_INCREMENT | Season's ID	 |
| season_number |	INT |	NULL |	Season's number	 |
| number_of_episodes |	INT |	NULL |	Season's number of episodes	 |
| created_at |	timestamp [current_timestamp()] | NOT NULL, DEFAULT CURRENT_TIMESTAMP |	Season's date of creation	
| updated_at |	timestamp |	NULL, DEFAULT CURRENT_TIMESTAMP | Date of last update |

#  GENRE

| Field | Type | Specificity | Description | 
| :----: |:------:|:---------:|:----:|	
| id | INT | PRIMARY KEY, UNSIGNED, NOT NULL, AUTO_INCREMENT | Category ID |
| name | varchar(128) | NOT NULL | Category name |
| created_at | timestamp | NOT NULL, DEFAULT CURRENT_TIMESTAMP | Categories date of creation |
| updated_at | timestamp |	NULL, DEFAULT CURRENT_TIMESTAMP | Date of last update |