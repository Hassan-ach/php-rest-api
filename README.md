# REST API Documentation

## Project Overview

This is a Laravel-based REST API with JWT authentication that provides user management and product catalog functionality. The API follows RESTful principles and uses JSON Web Tokens for secure authentication.

## Features

- **User Authentication**
    - Registration with email verification
    - Login/logout functionality
    - JWT token-based authentication
- **User Management**
    - Profile creation with personal details
    - Address management
- **Product Catalog**
    - CRUD operations for products
    - Public read access, authenticated write access

## API Endpoints

### Authentication

| Method | Endpoint    | Description              | Auth Required |
| ------ | ----------- | ------------------------ | ------------- |
| POST   | `/register` | Register new user        | No            |
| POST   | `/login`    | Login existing user      | No            |
| POST   | `/logout`   | Invalidate current token | Yes           |

### User Address

| Method | Endpoint           | Description      | Auth Required |
| ------ | ------------------ | ---------------- | ------------- |
| POST   | `/user/addAddress` | Add user address | Yes           |

### Products

| Method    | Endpoint         | Description          | Auth Required |
| --------- | ---------------- | -------------------- | ------------- |
| GET       | `/products`      | List all products    | No            |
| GET       | `/products/{id}` | Get specific product | No            |
| POST      | `/products`      | Create new product   | Yes           |
| PUT/PATCH | `/products/{id}` | Update product       | Yes           |
| DELETE    | `/products/{id}` | Delete product       | Yes           |

## Request/Response Examples

### User Registration

**Request:**

```json
POST /register
{
  "firstname": "John",
  "lastname": "Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "gender": "male"
}
```

**Success Response:**

```json
{
    "data": {
        "user": {
            "firstname": "John",
            "lastname": "Doe",
            "email": "john@example.com",
            "gender": "male"
        },
        "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
    },
    "message": "User registered successfully."
}
```

## Security

- JWT token authentication
- Password hashing
- CSRF protection
- Input validation

## License

[MIT](https://choosealicense.com/licenses/mit/)j
