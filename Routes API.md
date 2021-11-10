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
    "email": "user@keskonmate.me",
    "userNickname": "user",
    "createdAt": "2021-11-09T17:12:46+01:00",
    "updatedAt": "2021-11-10T11:46:27+01:00",
    "userlist": [
      {
        "id": 25,
        "series": {
          "id": 22,
          "title": "Rookie Vets",
          "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nimis multa. Quae cum essent dicta, discessimus. Beatum, inquit. An hoc usque quaque, aliter in vita? \n\n",
          "releaseDate": "2021-11-09T00:00:00+01:00",
          "image": "https:\/\/i.ibb.co\/ySnm17G\/Keskonmate.png",
          "director": "Xavier Muspimerol",
          "numberOfSeasons": 0,
          "createdAt": "2021-11-09T17:10:20+01:00",
          "updatedAt": null
        },
        "seasonNb": 1,
        "episodeNb": 1,
        "createdAt": "2021-10-27T12:40:34+02:00",
        "updatedAt": null,
        "type": 1
      },
    ]
  },
  {
    "id": 2,
    "email": "test@keskonmate.io",
    "userNickname": "test",
    "createdAt": "2021-11-09T17:16:02+01:00",
    "updatedAt": "2021-11-09T17:16:02+01:00",
    "userlist": []
  },
]
```
## URL Read: /api/v1/users/id {GET}

```json
{
    "id": 1,
    "email": "user@keskonmate.me",
    "userNickname": "user",
    "createdAt": "2021-11-09T17:12:46+01:00",
    "updatedAt": "2021-11-10T11:46:27+01:00",
    "userlist": [
      {
        "id": 25,
        "series": {
          "id": 22,
          "title": "Rookie Vets",
          "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nimis multa. Quae cum essent dicta, discessimus. Beatum, inquit. An hoc usque quaque, aliter in vita? \n\n",
          "releaseDate": "2021-11-09T00:00:00+01:00",
          "image": "https:\/\/i.ibb.co\/ySnm17G\/Keskonmate.png",
          "director": "Xavier Muspimerol",
          "numberOfSeasons": 0,
          "createdAt": "2021-11-09T17:10:20+01:00",
          "updatedAt": null
        },
        "seasonNb": 1,
        "episodeNb": 1,
        "createdAt": "2021-10-27T12:40:34+02:00",
        "updatedAt": null,
        "type": 1
      },
    ]
},

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
    "name": "Allan Lane",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/8LXIG08k8q7eEOFjScFEARW2HOB.jpg",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Monsieur Ed, le cheval qui parle"
      }
    ]
  },
  {
    "id": 2,
    "name": "Connie Hines",
    "image": "https:\/\/www.themoviedb.org\/assets\/2\/v4\/glyphicons\/basic\/glyphicons-basic-4-user-grey-d8fe957375e70239d6abdd549fd7568c89281b2179b5f4470e2e12895792dfa5.svg",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Monsieur Ed, le cheval qui parle"
      }
    ]
  },
  
]
```

## URL Read: /api/v1/actors/id {GET}

```json
{
    "id": 1,
    "name": "Allan Lane",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/8LXIG08k8q7eEOFjScFEARW2HOB.jpg",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 1,
        "title": "Monsieur Ed, le cheval qui parle"
      }
    ]
} 
```

# Genres:
## URL Browse: /api/v1/genres {GET}

```json
[
  {
    "id": 1,
    "name": "Action & Adventure",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 26,
        "title": "Q.E.D."
      }
    ]
  },
  {
    "id": 2,
    "name": "Animation",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 6,
        "title": "The New Scooby and Scrappy-Doo Show"
      },
      {
        "id": 8,
        "title": "Space Sentinels"
      },
      {
        "id": 15,
        "title": "Aqua Teen Hunger Force"
      },
      {
        "id": 42,
        "title": "Inhumanoids"
      }
    ]
  },
]
```

## URL Read: /api/v1/genres/id {GET}

```json
{
    "id": 1,
    "name": "Action & Adventure",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": [
      {
        "id": 26,
        "title": "Q.E.D."
      }
    ]
  }
```

# Season:
## URL Browse: /api/v1/seasons {GET}


```json
[
  {
    "id": 1,
    "seasonNumber": 0,
    "numberOfEpisodes": 4,
    "image": "https:\/\/www.themoviedb.org\/assets\/2\/v4\/glyphicons\/basic\/glyphicons-basic-38-picture-grey-c2ebdbb057f2a7614185931650f8cee23fa137b93812ccb132b9df511df1cfac.svg",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": {
      "id": 1,
      "title": "Monsieur Ed, le cheval qui parle"
    }
  },
  {
    "id": 2,
    "seasonNumber": 1,
    "numberOfEpisodes": 4,
    "image": "https:\/\/www.themoviedb.org\/assets\/2\/v4\/glyphicons\/basic\/glyphicons-basic-38-picture-grey-c2ebdbb057f2a7614185931650f8cee23fa137b93812ccb132b9df511df1cfac.svg",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": {
      "id": 1,
      "title": "Mega 64"
    }
  }  
]
```
## URL Read: /api/v1/seasons/id {GET}


```json
{
    "id": 1,
    "seasonNumber": 0,
    "numberOfEpisodes": 4,
    "image": "https:\/\/www.themoviedb.org\/assets\/2\/v4\/glyphicons\/basic\/glyphicons-basic-38-picture-grey-c2ebdbb057f2a7614185931650f8cee23fa137b93812ccb132b9df511df1cfac.svg",
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "series": {
      "id": 1,
      "title": "Monsieur Ed, le cheval qui parle"
    }
}
```

# Userlist: 
## URL Browse: /api/v1/userlists {GET}

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
]
```

## URL Read: /api/v1/userlists/id {GET}

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

## URL Edit: /api/v1/userlists/id {PATCH}

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
    "series": 2
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
  {
    "id": 1,
    "title": "Monsieur Ed, le cheval qui parle",
    "synopsis": "Wilbur Post et sa femme Carol emménagent dans une belle maison. Lorsque Wilbur jette un coup d'œil dans sa nouvelle grange, il constate que l'ancien propriétaire a laissé son cheval derrière lui. Ce cheval n'est pas un cheval ordinaire... il ne peut parler qu'à Wilbur, ce qui entraîne toutes sortes de mésaventures pour Wilbur et son acolyte fauteur de troubles, Monsieur Ed.",
    "releaseDate": "1961-01-05T00:00:00+01:00",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/luppCk9XUcs0gUEf9Sv7MhiJv4H.jpg",
    "director": "Walter R. Brooks",
    "numberOfSeasons": 6,
    "homeOrder": null,
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 3,
        "name": "Comédie"
      }
    ],
    "season": [
      {
        "id": 1,
        "seasonNumber": 0
      },
      {
        "id": 2,
        "seasonNumber": 1
      },
    ],
    "actor": [
      {
        "id": 1,
        "name": "Allan Lane",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/8LXIG08k8q7eEOFjScFEARW2HOB.jpg"
      },
    ]
  },
  {
    "id": 2,
    "title": "Mega64",
    "synopsis": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quae diligentissime contra Aristonem dicuntur a Chryippo. Bonum incolumis acies: misera caecitas. Nam ante Aristippus, et ille melius. Si id dicis, vicimus. Quis non odit sordidos, vanos, leves, futtiles? Quod quidem iam fit etiam in Academia. Duo Reges: constructio interrete. Ex rebus enim timiditas, non ex vocabulis nascitur. \n\n",
    "releaseDate": "2004-11-18T00:00:00+01:00",
    "image": "https:\/\/i.ibb.co\/ySnm17G\/Keskonmate.png",
    "director": "Derrick Acosta",
    "numberOfSeasons": 4,
    "homeOrder": null,
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 3,
        "name": "Comédie"
      }
    ],
    "season": [
      {
        "id": 8,
        "seasonNumber": 0
      },
    ],
    "actor": [
      {
        "id": 6,
        "name": "Rocco Botte",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/83dugHkP4Davdwnpa3VcnyiBcPY.jpg"
      },
      {
        "id": 7,
        "name": "Shawn Chatfield",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/7UWVMS79HmhnM8L16TU2XM4PFyY.jpg"
      },
    ]
  },
   
]
```

## URL Read: /api/v1/series/id {GET}

```json
{
    "id": 1,
    "title": "Monsieur Ed, le cheval qui parle",
    "synopsis": "Wilbur Post et sa femme Carol emménagent dans une belle maison. Lorsque Wilbur jette un coup d'œil dans sa nouvelle grange, il constate que l'ancien propriétaire a laissé son cheval derrière lui. Ce cheval n'est pas un cheval ordinaire... il ne peut parler qu'à Wilbur, ce qui entraîne toutes sortes de mésaventures pour Wilbur et son acolyte fauteur de troubles, Monsieur Ed.",
    "releaseDate": "1961-01-05T00:00:00+01:00",
    "image": "https:\/\/www.themoviedb.org\/t\/p\/w1920_and_h800_multi_faces\/luppCk9XUcs0gUEf9Sv7MhiJv4H.jpg",
    "director": "Walter R. Brooks",
    "numberOfSeasons": 6,
    "homeOrder": null,
    "createdAt": "2021-11-09T17:10:20+01:00",
    "updatedAt": null,
    "genre": [
      {
        "id": 3,
        "name": "Comédie"
      }
    ],
    "season": [
      {
        "id": 1,
        "seasonNumber": 0
      },
      {
        "id": 2,
        "seasonNumber": 1
      },
    ],
    "actor": [
      {
        "id": 1,
        "name": "Allan Lane",
        "image": "https:\/\/www.themoviedb.org\/t\/p\/w138_and_h175_face\/8LXIG08k8q7eEOFjScFEARW2HOB.jpg"
      },
    ]
  }
```