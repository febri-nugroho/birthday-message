
## Setup

- This application using Laravel 9 and MySQL database
- Clone the repository
- Install database birthday-message on database/birthday-message.sql
- Run this step to install project
```bash
  composer install
```
- Run this command to execute send email birthday message
```bash
  php artisan auto:birthdaymessage
```
- Run this command to 
```bash
  * * * * * cd /birthday-message && php artisan schedule:run >> /dev/null 2>&1
```

## API Reference

#### Create User

```http
  POST /api/users
```

| Parameter    | Type     | Description                |
| :--------    | :------- | :------------------------- |
| `first_name` | `string` | **Required**. first name |
| `last_name` | `string` | **Required**. last name |
| `email` | `string` | **Required**. email |
| `birthday` | `date` | **Required**. birthday date |
| `location` | `string` | **Required**. location timezone |

#### DELETE User

```http
  DELETE /api/user/{id}
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `id`      | `integer` | **Required**. Id of users |


