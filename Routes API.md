# User: 
## URL Browse: /api/v1/users {GET}

```json
[
  {
    "id": 1,
    "email": "tux@keskonmate.io",
    "userNickname": "Tux",
    "createdAt": "2021-10-27T12:09:27+02:00",
    "updatedAt": null,
    "userlist": [
      {
        "id": 1,
        "seasonNb": 5,
        "seriesNb": 1,
        "episodeNb": 3,
        "createdAt": "2021-10-27T12:40:34+02:00",
        "updatedAt": null,
        "type": 1,
        "series": [
          {
            "id": 1,
            "title": "Game of Thrones",
            "synopsis": "Plein de gens meurent",
            "releaseDate": null,
            "image": "dfgfdg.jpg",
            "director": "",
            "numberOfSeasons": 5,
            "createdAt": "2021-10-27T15:18:38+02:00",
            "updatedAt": null,
            "season": [
              {
                "id": 2,
                "seasonNumber": 1
              }
            ]
          }
        ]
      }
    ]
  },
  {
    "id": 12,
    "email": "nico@keskonmate.io",
    "userNickname": "Nico",
    "createdAt": "2021-10-27T15:31:06+02:00",
    "updatedAt": null,
    "userlist": [
      {
        "id": 2,
        "seasonNb": 2,
        "seriesNb": 2,
        "episodeNb": 3,
        "createdAt": "2021-10-27T15:31:06+02:00",
        "updatedAt": null,
        "type": 2,
        "series": [
          {
            "id": 2,
            "title": "The Big Bang Theory",
            "synopsis": "Des geeks",
            "releaseDate": null,
            "image": null,
            "director": "",
            "numberOfSeasons": 1,
            "createdAt": "2021-10-29T11:09:26+02:00",
            "updatedAt": null,
            "season": [
              {
                "id": 3,
                "seasonNumber": 1
              },
              {
                "id": 4,
                "seasonNumber": 2
              }
            ]
          }
        ]
      }
    ]
  }
]
```
## URL Read: /api/v1/users/id {GET}

```json
{
  "id": 1,
  "email": "tux@keskonmate.io",
  "userNickname": "Tux",
  "createdAt": "2021-10-27T12:09:27+02:00",
  "updatedAt": null,
  "userlist": [
    {
      "id": 1,
      "seasonNb": 5,
      "seriesNb": 1,
      "episodeNb": 3,
      "createdAt": "2021-10-27T12:40:34+02:00",
      "updatedAt": null,
      "type": 1,
      "series": [
        {
          "id": 1,
          "title": "Game of Thrones",
          "synopsis": "Plein de gens meurent",
          "releaseDate": null,
          "image": "dfgfdg.jpg",
          "director": "",
          "numberOfSeasons": 5,
          "createdAt": "2021-10-27T15:18:38+02:00",
          "updatedAt": null,
          "season": [
            {
              "id": 2,
              "seasonNumber": 1
            }
          ]
        }
      ]
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

## URL Delete: /api/v1/users/id {DELETE} (ne pas utiliser)


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
[  
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

# Genres:
## URL Browse: /api/v1/genres {GET}

```json
[
  {
    "id": 1,
    "name": "Action",
    "createdAt": "2021-10-27T12:34:40+02:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Game of Thrones"
      }
    ]
  },
  {
    "id": 2,
    "name": "Reaction",
    "createdAt": "2021-10-29T14:54:39+02:00",
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

## URL Read: /api/v1/genres/id {GET}

```json
[
  {
    "id": 1,
    "name": "Action",
    "createdAt": "2021-10-27T12:34:40+02:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Game of Thrones""
      }
    ]
  }
]
```

# Season:
## URL Browse: /api/v1/seasons {GET}


```json
[
  {
    "id": 2,
    "seasonNumber": 1,
    "numberOfEpisodes": 15,
    "image": "image.jpg",
    "createdAt": "2021-10-27T12:38:45+02:00",
    "updatedAt": null,
    "series": {
      "id": 1,
      "title": "Game of Thrones"
    }
  },
  {
    "id": 3,
    "seasonNumber": 1,
    "numberOfEpisodes": 15,
    "image": "image.jpg",
    "createdAt": "2021-10-29T11:09:55+02:00",
    "updatedAt": null,
    "series": {
      "id": 2,
      "title": "The Big Bang Theory"
    }
  },
  {
    "id": 4,
    "seasonNumber": 2,
    "numberOfEpisodes": 14,
    "image": "image.jpg",
    "createdAt": "2021-10-29T11:12:51+02:00",
    "updatedAt": null,
    "series": {
      "id": 2,
      "title": "The Big Bang Theory"
    }
  }
]
```
## URL Read: /api/v1/seasons/id {GET}


```json
[
 {
    "id": 4,
    "seasonNumber": 2,
    "numberOfEpisodes": 14,
    "image": "image.jpg",
    "createdAt": "2021-10-29T11:12:51+02:00",
    "updatedAt": null,
    "series": {
      "id": 2,
      "title": "The Big Bang Theory"
    }
  }
]
```

# Userlist: 
## URL Browse: /api/v1/userlists {GET}

```json
[
  {
    "id": 1,
    "seasonNb": 5,
    "seriesNb": 1,
    "episodeNb": 3,
    "createdAt": "2021-10-27T12:40:34+02:00",
    "updatedAt": null,
    "type": 1,
    "series": [
      {
        "id": 1,
        "title": "Game of Thrones"
      }
    ],
    "users": {
      "id": 1,
      "email": "tux@keskonmate.io"
    }
  },
  {
    "id": 2,
    "seasonNb": 2,
    "seriesNb": 2,
    "episodeNb": 3,
    "createdAt": "2021-10-27T15:31:06+02:00",
    "updatedAt": null,
    "type": 2,
    "series": [
      {
        "id": 2,
        "title": "The Big Bang Theory"
      }
    ],
    "users": {
      "id": 12,
      "email": "nico@keskonmate.io"
    }
  }
]
```

## URL Read: /api/v1/userlists/id {GET}

```json
[{
    "id": 2,
    "seasonNb": 2,
    "seriesNb": 2,
    "episodeNb": 3,
    "createdAt": "2021-10-27T15:31:06+02:00",
    "updatedAt": null,
    "type": 2,
    "series": [
      {
        "id": 2,
        "title": "The Big Bang Theory"
      }
    ],
    "users": {
      "id": 12,
      "email": "nico@keskonmate.io"
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
    "series": [],
    "users": {}
  }
]
```
# Series:
## URL Browse: /api/v1/series {GET}

```json
[
  {
    "id": 1,
    "title": "Game of Thrones",
    "synopsis": "Plein de gens meurent",
    "releaseDate": null,
    "image": "dfgfdg.jpg",
    "director": "",
    "numberOfSeasons": 5,
    "homeOrder": 1,
    "createdAt": "2021-10-27T15:18:38+02:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 1,
        "name": "Action"
      }
    ],
    "season": [
      {
        "id": 2,
        "seasonNumber": 1
      }
    ],
    "actor": [
      {
        "id": 1,
        "name": "Keanu Reeves",
        "image": "kreeves.jpg"
      }
    ]
  },
  {
    "id": 2,
    "title": "The Big Bang Theory",
    "synopsis": "Des geeks",
    "releaseDate": null,
    "image": null,
    "director": "",
    "numberOfSeasons": 1,
    "homeOrder": 2,
    "createdAt": "2021-10-29T11:09:26+02:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 2,
        "name": "Reaction"
      }
    ],
    "season": [
      {
        "id": 3,
        "seasonNumber": 1
      },
      {
        "id": 4,
        "seasonNumber": 2
      }
    ],
    "actor": [
      {
        "id": 1,
        "name": "Keanu Reeves",
        "image": "kreeves.jpg"
      },
      {
        "id": 2,
        "name": "Mister Bean",
        "image": "mrbean.jpg"
      }
    ]
  }
]
```

## URL Read: /api/v1/series/id {GET}

```json
[
  {
    "id": 2,
    "title": "The Big Bang Theory",
    "synopsis": "Des geeks",
    "releaseDate": null,
    "image": null,
    "director": "",
    "numberOfSeasons": 1,
    "homeOrder": 2,
    "createdAt": "2021-10-29T11:09:26+02:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 2,
        "name": "Reaction"
      }
    ],
    "season": [
      {
        "id": 3,
        "seasonNumber": 1
      },
      {
        "id": 4,
        "seasonNumber": 2
      }
    ],
    "actor": [
      {
        "id": 1,
        "name": "Keanu Reeves",
        "image": "kreeves.jpg"
      },
      {
        "id": 2,
        "name": "Mister Bean",
        "image": "mrbean.jpg"
      }
    ]
  }
]
```