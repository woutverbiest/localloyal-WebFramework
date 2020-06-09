# localloyal
## Web Frameworks
This server part of the localloyal project is handeling the requests from the progressive web app. This server was developed in laravel7.

## Api documentation

all api routes have the prefix `/api`.

### login
POST `/login`

***
### signup
POST `/register`

***
### user
GET `/user`

#
POST `/user`

#
GET `/user/{uuid}`

#
POST `/user/password`

***
### shop
GET `/shop`

#
POST `/shop`

#
POST `/shop/create`

#
GET `/shop/all`

#
GET `/shop/types`

#
GET `/shop/{shopuuid}`

#
GET `/shop/{shopuuid}/rewards`

#
GET `/shop/{shopuuid}/openinghours`

***
### reward
POST `/reward`

#
POST `/reward/{rewarduuid}`

#
DELETE `/reward/{rewarduuid}`

#
GET `/reward/{rewarduuid}`

***
### transactions
GET `/transactions`

***
### openinghours
POST `/openinghours`

***
### code
POST `/code`

***
### node

POST `/node/password`