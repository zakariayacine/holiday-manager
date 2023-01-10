
# Holiday Manager

A brief description of what this project does and who it's for

#### Installation
Clone this project in your WWW folder and create a virtual host that point into /holiday-manager/public

## Role informations

| Role | 
| :-------- | 
| `admin` | 
| `manager` | 
| `emp` | 

## API Reference

#### Register

```http
  POST /register
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `nom` | `string` | **Required**. |
| `email` | `string` | **Required**. |
| `password` | `string` | **Required**.|
| `role` | `string` | **Required**.  Accepted values: "admin","manager","emp" |

#### Login

```http
  POST /login
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. |
| `password` | `string` | **Required**.|


It will return user token connexion.

#### leave Request Role : EMP only

```http
  POST /leaveRequest
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `token` | `string` | **Required**. |
| `date_de_depart` | `date` | **Required**. format : yyyy-mm-dd|
| `date_de_retour` | `date` | **Required**. format : yyyy-mm-dd|
| `commentaire` | `string` | **Required**. |

#### Personal Request liste : Role EMP only

```http
  POST /requests
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `token` | `string` | **Required**. |


#### get All Users liste : Role ADMIN only

```http
  POST /getAllUsers
```
| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `token` | `string` | **Required**. |
