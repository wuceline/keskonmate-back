# Login
http://localhost:8080/api/login

# API V1:
# Actors
## Actors Browse {GET}

http://localhost:8080/api/v1/actors

```json
[
  {
    "id": 1,
    "name": "Johnny Whitaker",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/rxUX4BH5lM1We1ei9xbp4CVgSxY.jpg",
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Sigmund and the Sea Monsters"
      }
    ]
  },
  {
    "id": 2,
    "name": "Rip Taylor",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/qqEGeLNaAXPLKJVjjLpWVyNyFIu.jpg",
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Sigmund and the Sea Monsters"
      }
    ]
  }, 
  etc...
]
```

## Actors Read {GET}

http://localhost:8080/api/v1/actors/{id}

```json
{
  "id": 1,
  "name": "Johnny Whitaker",
  "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/rxUX4BH5lM1We1ei9xbp4CVgSxY.jpg",
  "createdAt": "2021-11-10T17:15:35+01:00",
  "updatedAt": null,
  "series": [
    {
      "id": 1,
      "title": "Sigmund and the Sea Monsters"
    }
  ]
}
```

# Genres
## Genres Browse {GET}

http://localhost:8080/api/v1/genres

```json
[
  {
    "id": 1,
    "name": "Action & Adventure",
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 8,
        "title": "American Dragon: Jake Long"
      },
      {
        "id": 15,
        "title": "Capitaine Scarlet"
      }
    ]
  },
  {
    "id": 2,
    "name": "Animation",
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 6,
        "title": "Bod"
      },
      {
        "id": 7,
        "title": "Space Sentinels"
      }
    ]
  },
  etc...
]
```

## Genres Read {GET}

http://localhost:8080/api/v1/genres/{id}

```json
{
  "id": 1,
  "name": "Action & Adventure",
  "createdAt": "2021-11-10T17:15:35+01:00",
  "updatedAt": null,
  "series": [
    {
      "id": 8,
      "title": "American Dragon: Jake Long"
    },
    {
      "id": 15,
      "title": "Capitaine Scarlet"
    },
    {
      "id": 25,
      "title": "Torchwood"
    }
  ]
}
```


# Season
## Season Browse {GET}

http://localhost:8080/api/v1/seasons

```json
[
  {
    "id": 1,
    "seasonNumber": 1,
    "numberOfEpisodes": 17,
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w130_and_h195_bestv2\/mmMNO8rfRBjQP6XctOXe5gGotO6.jpg",
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "series": {
      "id": 1,
      "title": "Sigmund and the Sea Monsters"
    }
  },
  {
    "id": 2,
    "seasonNumber": 2,
    "numberOfEpisodes": 12,
    "image": "https:\/\/www.themoviedb.org\/assets\/2\/v4\/glyphicons\/basic\/glyphicons-basic-38-picture-grey-c2ebdbb057f2a7614185931650f8cee23fa137b93812ccb132b9df511df1cfac.svg",
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "series": {
      "id": 1,
      "title": "Sigmund and the Sea Monsters"
    }
  },
  etc...
]
```

## Season Read {GET}

http://localhost:8080/api/v1/seasons/{id}

```json
{
  "id": 1,
  "seasonNumber": 1,
  "numberOfEpisodes": 17,
  "image": "https:\/\/www.themoviedb.org\/t\/p\/w130_and_h195_bestv2\/mmMNO8rfRBjQP6XctOXe5gGotO6.jpg",
  "createdAt": "2021-11-10T17:15:35+01:00",
  "updatedAt": null,
  "series": {
    "id": 1,
    "title": "Sigmund and the Sea Monsters"
  }
}
```


# Series
## Series Browse {GET}

http://localhost:8080/api/v1/series

```json
[
  {
    "id": 1,
    "title": "Sigmund and the Sea Monsters",
    "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemne, quod iucunde? Duo Reges: constructio interrete. Haec dicuntur inconstantissime.; \n\n",
    "releaseDate": "1973-09-08T00:00:00+01:00",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/elRBynx0PN8xUMfwEXuyAKR11Ep.jpg",
    "director": "Marty Krofft",
    "numberOfSeasons": 2,
    "homeOrder": null,
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 8,
        "name": "Kids"
      },
      {
        "id": 12,
        "name": "Science-Fiction & Fantastique"
      }
    ],
    "season": [
      {
        "id": 1,
        "seasonNumber": 1
      },
      {
        "id": 2,
        "seasonNumber": 2
      }
    ],
    "actor": [
      {
        "id": 1,
        "name": "Johnny Whitaker",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/rxUX4BH5lM1We1ei9xbp4CVgSxY.jpg"
      },
      {
        "id": 2,
        "name": "Rip Taylor",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/qqEGeLNaAXPLKJVjjLpWVyNyFIu.jpg"
      }
    ]
  },
  {
    "id": 3,
    "title": "Pride",
    "synopsis": "Satonaka Halu est un joueur de hockey dans l'équipe des Scorpions dont il est capitaine. Et à cause de son engagement dans ce sport, il ne peut considérer l'a...",
    "releaseDate": "2004-01-12T00:00:00+01:00",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/54CU1a2Wod9RCSVQ9BT0nUw5Enr.jpg",
    "director": "Xavier Muspimerol",
    "numberOfSeasons": 1,
    "homeOrder": null,
    "createdAt": "2021-11-10T17:15:35+01:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 6,
        "name": "Drame"
      }
    ],
    "season": [
      {
        "id": 3,
        "seasonNumber": 1
      }
    ],
    "actor": [
      {
        "id": 6,
        "name": "Takuya Kimura",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/rafirRSsSsZrSVV3znCUwwSGIGr.jpg"
      },
      {
        "id": 7,
        "name": "Yuko Takeuchi",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/y3Cnoni3enouqE7UlCZ1OtIPuOn.jpg"
      }
    ]
  },
  etc...
]
```

## Series Read {GET}

http://localhost:8080/api/v1/series/{id}

```json
{
  "id": 1,
  "title": "Sigmund and the Sea Monsters",
  "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemne, quod iucunde? Duo Reges: constructio interrete. Haec dicuntur inconstantissime. Cave putes quicquam esse verius. Minime vero, inquit ille, consentit. Immo alio genere; Fortasse id optimum, sed ubi illud: Plus semper voluptatis? Hunc vos beatum; \n\n",
  "releaseDate": "1973-09-08T00:00:00+01:00",
  "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/elRBynx0PN8xUMfwEXuyAKR11Ep.jpg",
  "director": "Marty Krofft",
  "numberOfSeasons": 2,
  "homeOrder": null,
  "createdAt": "2021-11-10T17:15:35+01:00",
  "updatedAt": null,
  "genre": [
    {
      "id": 8,
      "name": "Kids"
    },
    {
      "id": 12,
      "name": "Science-Fiction & Fantastique"
    }
  ],
  "season": [
    {
      "id": 1,
      "seasonNumber": 1
    },
    {
      "id": 2,
      "seasonNumber": 2
    }
  ],
  "actor": [
    {
      "id": 1,
      "name": "Johnny Whitaker",
      "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/rxUX4BH5lM1We1ei9xbp4CVgSxY.jpg"
    },
    {
      "id": 2,
      "name": "Rip Taylor",
      "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/qqEGeLNaAXPLKJVjjLpWVyNyFIu.jpg"
    },
  ]
}
```


# Users
## Users Browse {GET}

http://localhost:8080/api/v1/users

```json
[
  {
    "id": 2,
    "email": "admin@keskonmate.me",
    "userNickname": "admin",
    "createdAt": "2021-11-10T17:19:04+01:00",
    "updatedAt": null,
    "userlist": [
      {
        "id": 2,
        "series": {
          "id": 1,
          "title": "Sigmund and the Sea Monsters",
          "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemne, quod iucunde? Duo Reges: constructio interrete. \n\n",
          "releaseDate": "1973-09-08T00:00:00+01:00",
          "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/elRBynx0PN8xUMfwEXuyAKR11Ep.jpg",
          "director": "Marty Krofft",
          "numberOfSeasons": 2,
          "createdAt": "2021-11-10T17:15:35+01:00",
          "updatedAt": null
        },
        "seasonNb": 1,
        "episodeNb": 1,
        "createdAt": "2021-11-11T02:11:06+01:00",
        "updatedAt": null,
        "type": 1
      }
    ]
  }
  {
    "id": 5,
    "email": "test@keskonmate.me",
    "userNickname": "test",
    "createdAt": "2021-11-10T17:19:04+01:00",
    "updatedAt": null,
    "userlist": [
      {
        "id": 2,
        "series": {
          "id": 1,
          "title": "Sigmund and the Sea Monsters",
          "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemne, quod iucunde? Duo Reges: constructio interrete. \n\n",
          "releaseDate": "1973-09-08T00:00:00+01:00",
          "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/elRBynx0PN8xUMfwEXuyAKR11Ep.jpg",
          "director": "Marty Krofft",
          "numberOfSeasons": 2,
          "createdAt": "2021-11-10T17:15:35+01:00",
          "updatedAt": null
        },
        "seasonNb": 1,
        "episodeNb": 1,
        "createdAt": "2021-11-11T02:11:06+01:00",
        "updatedAt": null,
        "type": 1
      }
    ]
  }
  etc...
]
```

## Users Read {GET}

http://localhost:8080/api/v1/users/{id}

```json

{
  "id": 2,
  "email": "admin@keskonmate.me",
  "userNickname": "admin",
  "createdAt": "2021-11-10T17:19:04+01:00",
  "updatedAt": null,
  "userlist": [
    {
      "id": 2,
      "series": {
        "id": 1,
        "title": "Sigmund and the Sea Monsters",
        "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Idemne, quod iucunde? Duo Reges: constructio interrete. \n\n",
        "releaseDate": "1973-09-08T00:00:00+01:00",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/elRBynx0PN8xUMfwEXuyAKR11Ep.jpg",
        "director": "Marty Krofft",
        "numberOfSeasons": 2,
        "createdAt": "2021-11-10T17:15:35+01:00",
        "updatedAt": null
      },
      "seasonNb": 1,
      "episodeNb": 1,
      "createdAt": "2021-11-11T02:11:06+01:00",
      "updatedAt": null,
      "type": 1
    },
    {
      "id": 8,
      "series": {
        "id": 22,
        "title": "Une famille presque parfaite",
        "synopsis": "Judy et Bill se sont connus au secondaire (lycée en France) dans les années 1970, à une époque où la liberté et l'ouverture d'esprit prévalaient...",
        "releaseDate": "2002-09-30T00:00:00+02:00",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/3hCgghAAKralrDmiFtyZvsHC9aP.jpg",
        "director": "Diane Burroughs",
        "numberOfSeasons": 4,
        "createdAt": "2021-11-10T17:15:35+01:00",
        "updatedAt": null
      },
      "seasonNb": 1,
      "episodeNb": 1,
      "createdAt": "2021-10-27T12:40:34+02:00",
      "updatedAt": null,
      "type": 1
    }
  ]
}
```

## Users Edit {PATCH}

http://localhost:8080/api/v1/users/{id}

```json
{  	
  "email": "test2@keskonmate.me",
	"password": "admin2",
  "userNickname": "test2"
}
```

# Users Add {POST}

http://localhost:8080/api/v1/users

```json
{  	
  "email": "test@keskonmate.me",
	"password": "admin",
  "userNickname": "test",
  "createdAt": "2021-10-27T15:31:06+02:00"
}
```


# Userlists
## Userlists Browse {GET}

http://localhost:8080/api/v1/userlists

```json
[
  {
    "id": 25,
    "series": {
      "id": 22,
      "title": "Rookie Vets"
    },
    "seasonNb": 1,
    "episodeNb": 1,
    "createdAt": "2021-10-27T12:40:34+02:00",
    "updatedAt": null,
    "type": 1,
    "users": {
      "id": 1,
      "email": "user@keskonmate.me"
    }
  },
  {
    "id": 29,
    "series": {
      "id": 22,
      "title": "Rookie Vets"
    },
    "seasonNb": 1,
    "episodeNb": 1,
    "createdAt": "2021-10-27T12:40:34+02:00",
    "updatedAt": null,
    "type": 1,
    "users": {
      "id": 1,
      "email": "user@keskonmate.me"
    }
  },
  etc...
]
```

## Userlists Read {GET}

http://localhost:8080/api/v1/userlists/{id}

```json
{
  "id": 25,
  "series": {
    "id": 22,
    "title": "Rookie Vets"
  },
  "seasonNb": 1,
  "episodeNb": 1,
  "createdAt": "2021-10-27T12:40:34+02:00",
  "updatedAt": null,
  "type": 1,
  "users": {
    "id": 1,
    "email": "user@keskonmate.me"
  }
}
```

## Userlists Edit {PATCH}

http://localhost:8080/api/v1/userlists/{id}

```json
{	
  "seasonNb": 9,
  "episodeNb": 9,
  "type": 2,
	"users": 5,
	"series": 21
}
```

# Userlists Add {POST}

http://localhost:8080/api/v1/userlists

```json
{	
  "seasonNb": 1,
  "episodeNb": 3,
  "createdAt": "2021-10-27T12:40:34+02:00",
  "type": 1,
	"users": 2,
	"series": 22
}
```

====================================================================================================================================


# API V2: /api/v2/series

## Series:
## Routes {GET}

 /api/v2/series?order[parametre]=<asc|desc>
 [parametres]: id, title, releaseDate, director
 Exemple: Pour lister les series par realisateur, de Z a A: http://keskonmate.me/api/v2/series?order[director]=desc
          Pour lister les series par id, croissant :        http://keskonmate.me/api/v2/series?order[id]=asc

```json

```
 
## Genres:
## Routes {GET}

 /api/v2/genres?order[parametre]=<asc|desc>
 [parametres]: id, name
 Exemple: Pour lister les series par nom, de Z a A:   http://keskonmate.me/api/v2/series?order[name]=desc
          Pour lister les genres par id, croissant :  http://keskonmate.me/api/v2/genres?order[id]=asc

```json
{
  "@context": "\/api\/v2\/contexts\/Genre",
  "@id": "\/api\/v2\/genres",
  "@type": "hydra:Collection",
  "hydra:member": [
    {
      "@id": "\/api\/v2\/genres\/1",
      "@type": "Genre",
      "id": 1,
      "name": "Action & Adventure",
      "series": [
        {
          "@id": "\/api\/v2\/series\/8",
          "@type": "Series",
          "id": 8,
          "title": "American Dragon: Jake Long"
        },
        {
          "@id": "\/api\/v2\/series\/15",
          "@type": "Series",
          "id": 15,
          "title": "Capitaine Scarlet"
        }
      ]
    },
    {
      "@id": "\/api\/v2\/genres\/2",
      "@type": "Genre",
      "id": 2,
      "name": "Animation",
      "series": [
        {
          "@id": "\/api\/v2\/series\/6",
          "@type": "Series",
          "id": 6,
          "title": "Bod"
        },
        {
          "@id": "\/api\/v2\/series\/7",
          "@type": "Series",
          "id": 7,
          "title": "Space Sentinels"
        },
      ]
    }

  ]
}
```
