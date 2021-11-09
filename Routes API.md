# Login: 

```json
{
    "username": "dorian@keskonmate.io",
    "password": "admin"
}
```

# Reponse: 

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGc......",
  "userId": 2
}
```

# User: 
## URL Browse: /api/v1/users {GET}

```json
[
  {
    "id": 1,
    "email": "tux@keskonmate.io",
    "userNickname": "Tux",
    "createdAt": "2021-11-04T16:41:45+01:00",
    "updatedAt": null,
    "userlist": [
      {
        "id": 1,
        "seasonNb": 1,
        "seriesNb": 279,
        "episodeNb": 1,
        "createdAt": "2021-11-04T16:54:16+01:00",
        "updatedAt": null,
        "type": 1,
        "series": {
          "id": 279,
          "title": "Weeds",
          "synopsis": "",
          "releaseDate": "2017-08-07T00:00:00+02:00",
          "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/5VKxIBSMVZxIKqJVPNThAnjgcOS.jpg",
          "director": "Jenji Kohan",
          "numberOfSeasons": 8,
          "createdAt": "2021-11-04T13:27:32+01:00",
          "updatedAt": "2021-11-05T15:21:01+01:00",
          "genre": [
            {
              "id": 259,
              "name": "Comédie"
            },
            {
              "id": 260,
              "name": "Crime"
            },
            {
              "id": 262,
              "name": "Drame"
            }
          ],
          "season": [
            {
              "id": 1028,
              "seasonNumber": 0
            },
            {
              "id": 1029,
              "seasonNumber": 1
            },
          ],
          "actor": [
            [],
            [],            
          ]
        }
      }
    ]
  },
  {
    "id": 2,
    "email": "dorian2@keskonmate.io",
    "userNickname": "Dorian123",
    "createdAt": "2021-10-27T15:31:06+02:00",
    "updatedAt": null,
    "userlist": []
  },
  {
    "id": 3,
    "email": "admin@keskonmate.io",
    "userNickname": "admin",
    "createdAt": "2021-11-05T10:23:28+01:00",
    "updatedAt": null,
    "userlist": []
  }
]
```
## URL Read: /api/v1/users/id {GET}

```json
{
  "id": 1,
  "email": "tux@keskonmate.io",
  "userNickname": "Tux",
  "createdAt": "2021-11-04T16:41:45+01:00",
  "updatedAt": null,
  "userlist": [
    {
      "id": 1,
      "seasonNb": 1,
      "seriesNb": 279,
      "episodeNb": 1,
      "createdAt": "2021-11-04T16:54:16+01:00",
      "updatedAt": null,
      "type": 1,
      "series": {
        "id": 279,
        "title": "Weeds",
        "synopsis": "",
        "releaseDate": "2017-08-07T00:00:00+02:00",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/5VKxIBSMVZxIKqJVPNThAnjgcOS.jpg",
        "director": "Jenji Kohan",
        "numberOfSeasons": 8,
        "createdAt": "2021-11-04T13:27:32+01:00",
        "updatedAt": "2021-11-05T15:21:01+01:00",
        "genre": [
          {
            "id": 259,
            "name": "Comédie"
          },
          {
            "id": 260,
            "name": "Crime"
          },
          {
            "id": 262,
            "name": "Drame"
          }
        ],
        "season": [
          {
            "id": 1028,
            "seasonNumber": 0
          },
          {
            "id": 1029,
            "seasonNumber": 1
          },
        ],
        "actor": [
          [],
          [],
          [],
        ]
      }
    }
  ]
}
```

## URL Edit: /api/v1/users/id {PATCH}

```json
{
	"userNickname": "Tux"
}
```
ou
```json
{
	"email": "Tux@oclock.io"
}
```
ou
```json
{
	"email": "Tux@oclock.io",
  "userNickname": "Tux"
}
```
etc ...

## URL Add: /api/v1/users/id {POST}

```json
{  	
  "email": "exemple@keskonmate.io",
	"roles": ["ROLE_UTILISATEUR"],
	"password": "mot de passe",
  "userNickname": "John Doe",
  "createdAt": "2021-10-27T15:31:06+02:00",
  "updatedAt": null
}
```

## URL Delete: /api/v1/users/id {DELETE} (desactive)


# Actors:
## URL Browse: /api/v1/actors {GET}

```json
[
  {
    "id": 1,
    "name": "Keanu Reeves",
    "image": "kreeves.jpg",
    "createdAt": "2021-10-27T12:10:49+02:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Game of Thrones"
      },
      {
        "id": 2,
        "title": "The Big Bang Theory"
      }
    ]
  },
  {
    "id": 2,
    "name": "Mister Bean",
    "image": "mrbean.jpg",
    "createdAt": "2021-10-29T14:53:22+02:00",
    "updatedAt": null,
    "series": [
      {
        "id": 2,
        "title": "The Big Bang Theory"
      }
    ]
  }
]
```

## URL Read: /api/v1/actors/id {GET}

```json
{
  "id": 1290,
  "name": "Mary-Louise Parker",
  "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/1ohhrIZ4OMlLx9DvHjPhQJAIP0F.jpg",
  "createdAt": "2021-11-04T13:27:32+01:00",
  "updatedAt": null,
  "series": [
    {
      "id": 279,
      "title": "Weeds"
    }
  ]
}
```

# Genres:
## URL Browse: /api/v1/genres {GET}

```json
[
  {
    "id": 257,
    "name": "Action & Adventure",
    "createdAt": "2021-11-04T13:27:32+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 295,
        "title": "Pacific Blue"
      },
      {
        "id": 317,
        "title": "Jericho"
      },
    ]
  },
  {
    "id": 258,
    "name": "Animation",
    "createdAt": "2021-11-04T13:27:32+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 281,
        "title": "Captain Star"
      },
      {
        "id": 287,
        "title": "Squirrel Boy"
      },
      {
        "id": 291,
        "title": "Inhumanoids"
      },
    ]
  },
]
```

## URL Read: /api/v1/genres/id {GET}

```json
{
  "id": 257,
  "name": "Action & Adventure",
  "createdAt": "2021-11-04T13:27:32+01:00",
  "updatedAt": null,
  "series": [
    {
      "id": 295,
      "title": "Pacific Blue"
    },
    {
      "id": 317,
      "title": "Jericho"
    },
  ]
}
```

# Season:
## URL Browse: /api/v1/seasons {GET}


```json
[
  [
  {
    "id": 1028,
    "seasonNumber": 0,
    "numberOfEpisodes": 1,
    "image": "",
    "createdAt": "2021-11-04T13:27:32+01:00",
    "updatedAt": null,
    "series": {
      "id": 279,
      "title": "Weeds"
    }
  },
  {
    "id": 1029,
    "seasonNumber": 1,
    "numberOfEpisodes": 10,
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w130_and_h195_bestv2\/zYpR9LaslMCxjR1Llv5BwaeDyF4.jpg",
    "createdAt": "2021-11-04T13:27:32+01:00",
    "updatedAt": null,
    "series": {
      "id": 279,
      "title": "Weeds"
    }
  },
  ]
]
```
## URL Read: /api/v1/seasons/id {GET}


```json
{
  "id": 1080,
  "seasonNumber": 1,
  "numberOfEpisodes": 13,
  "image": "",
  "createdAt": "2021-11-04T13:27:32+01:00",
  "updatedAt": null,
  "series": {
    "id": 296,
    "title": "Joë chez les abeilles"
  }
}
```

# Userlist: 
## URL Browse: /api/v1/userlists {GET}

```json
[
  {
    "id": 1,
    "seasonNb": 1,
    "seriesNb": 279,
    "episodeNb": 1,
    "createdAt": "2021-11-04T16:54:16+01:00",
    "updatedAt": null,
    "type": 1,
    "series": {
      "id": 279,
      "title": "Weeds",
      "actor": [
        {
          "id": 1290,
          "name": "Mary-Louise Parker"
        },
        {
          "id": 1291,
          "name": "Justin Kirk"
        },
        {
          "id": 1292,
          "name": "Alexander Gould"
        },
        {
          "id": 1293,
          "name": "Kevin Nealon"
        },
        {
          "id": 1294,
          "name": "Hunter Parrish"
        },
        {
          "id": 1295,
          "name": "Jennifer Jason Leigh"
        },
        {
          "id": 1296,
          "name": "Ethan Kent"
        },
        {
          "id": 1297,
          "name": "Gavin Kent"
        }
      ]
    },
    "users": {
      "id": 1,
      "email": "tux@keskonmate.io"
    }
  }
]
```

## URL Read: /api/v1/userlists/id {GET}

```json
[
  {
    "id": 1,
    "seasonNb": 1,
    "seriesNb": 279,
    "episodeNb": 1,
    "createdAt": "2021-11-04T16:54:16+01:00",
    "updatedAt": null,
    "type": 1,
    "series": {
      "id": 279,
      "title": "Weeds",
      "actor": [
        {
          "id": 1290,
          "name": "Mary-Louise Parker"
        },
        {
          "id": 1291,
          "name": "Justin Kirk"
        },
        {
          "id": 1292,
          "name": "Alexander Gould"
        },
        {
          "id": 1293,
          "name": "Kevin Nealon"
        },
        {
          "id": 1294,
          "name": "Hunter Parrish"
        },
        {
          "id": 1295,
          "name": "Jennifer Jason Leigh"
        },
        {
          "id": 1296,
          "name": "Ethan Kent"
        },
        {
          "id": 1297,
          "name": "Gavin Kent"
        }
      ]
    },
    "users": {
      "id": 1,
      "email": "tux@keskonmate.io"
    }
  }
]
```

## URL Edit: /api/v1/userlists/id {PUT}

```json
[
  {
    "seasonNb": 2
  }
]
``` 
ou
```json
[
  {
    "seriesNb": 2
  }
]
```
ou
```json
[
  {
    "seriesNb": 2,
    "seasonNb": 2,
    "type": 2,
  }
]
```
etc....


## URL Add: /api/v1/userlists {POST}

```json
[{
    "id": 2,
    "seasonNb": 2,
    "seriesNb": 2,
    "episodeNb": 3,
    "createdAt": "2021-10-27T15:31:06+02:00",
    "updatedAt": null,
    "type": 2,
    "series": 1,
    "users": {}
  }
]
```
# Series:
## URL Browse: /api/v1/series {GET}

```json
[
  [
  {
    "id": 279,
    "title": "Weeds",
    "synopsis": "",
    "releaseDate": "2017-08-07T00:00:00+02:00",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/5VKxIBSMVZxIKqJVPNThAnjgcOS.jpg",
    "director": "Jenji Kohan",
    "numberOfSeasons": 8,
    "homeOrder": 1,
    "createdAt": "2021-11-04T13:27:32+01:00",
    "updatedAt": "2021-11-05T15:21:01+01:00",
    "genre": [
      {
        "id": 259,
        "name": "Comédie"
      },
      {
        "id": 260,
        "name": "Crime"
      },
      {
        "id": 262,
        "name": "Drame"
      }
    ],
    "season": [
      {
        "id": 1028,
        "seasonNumber": 0
      },
      {
        "id": 1029,
        "seasonNumber": 1
      },
      {
        "id": 1030,
        "seasonNumber": 2
      },
      {
        "id": 1031,
        "seasonNumber": 3
      },
    ],
    "actor": [
      {
        "id": 1290,
        "name": "Mary-Louise Parker",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/1ohhrIZ4OMlLx9DvHjPhQJAIP0F.jpg"
      },
      {
        "id": 1291,
        "name": "Justin Kirk",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/hwPliH9zK3keAYt3uo1ksAlIsNV.jpg"
      },
      {
        "id": 1292,
        "name": "Alexander Gould",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/fe4mUSp0XotA6Ku4Bs69Q9o2lqU.jpg"
      },
    ]
  },
  {
    "id": 280,
    "title": "River City",
    "synopsis": "",
    "releaseDate": "2002-09-24T00:00:00+02:00",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/mdYT9F9bZFcbiP2xxLnohKguqyP.jpg",
    "director": "Stephen Greenhorn",
    "numberOfSeasons": 10,
    "homeOrder": null,
    "createdAt": "2021-11-04T13:27:32+01:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 262,
        "name": "Drame"
      },
      {
        "id": 269,
        "name": "Soap"
      }
    ],
    "season": [
      {
        "id": 1037,
        "seasonNumber": 1
      },
      {
        "id": 1038,
        "seasonNumber": 2
      },
    ],
    "actor": []
  },
]
```

## URL Read: /api/v1/series/id {GET}

```json
{
  "id": 286,
  "title": "Dark Skies : L'Impossible Vérité",
  "synopsis": "Dans les années 1960, Kimberly Sayers et John Loengard emménagent à Washington pour le travail de John comme assistant parlementaire. Il enquête sur une administration, Majestic (voir Majestic 12 pour un possible parallèle), et découvre que celle-ci lutte contre une invasion extraterrestre en cours. Ils prennent possession de corps humains et leurs intentions ne sont pas pacifiques.John et Kim s'engagent dans le combat contre les envahisseurs, tout en essayant de rester à distance des agents de Majestic.",
  "releaseDate": "1996-09-21T00:00:00+02:00",
  "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/d6gaIKwu3e6AFqXnHwkJc2a2G3J.jpg",
  "director": "",
  "numberOfSeasons": 1,
  "homeOrder": null,
  "createdAt": "2021-11-04T13:27:32+01:00",
  "updatedAt": "2021-11-05T15:22:27+01:00",
  "genre": [
    {
      "id": 262,
      "name": "Drame"
    },
    {
      "id": 268,
      "name": "Science-Fiction & Fantastique"
    }
  ],
  "season": [
    {
      "id": 1063,
      "seasonNumber": 1
    }
  ],
  "actor": [
    {
      "id": 1328,
      "name": "Tim Kelleher",
      "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/8W3KgoIPUMNjqb3CxC9B8QjBsjM.jpg"
    },
    {
      "id": 1329,
      "name": "Eric Close",
      "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/njJYXuTlmCgI3VVHBFqkqrhiey3.jpg"
    },
  ]
}
```