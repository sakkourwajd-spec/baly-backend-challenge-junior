# Baly Backend Challenge - Junior

A simple, robust Ride-Hailing / Food Delivery Order System API built using Laravel and Eloquent ORM.

## Features & API Endpoints

### 🚗 Drivers API
* **PATCH** `/api/drivers/{id}/status` -> Updates a captain's availability status (`active`/`inactive`).

### 📦 Orders API
* **POST** `/api/orders` -> Places a new order (defaults to `pending`). Requires `user_id` and `price`.
* **PATCH** `/api/orders/{id}/status` -> Updates the progress state of an order (`pending`, `accepted`, `completed`, `cancelled`) and links an available `driver_id`.

## Tech Stack
* Backend Framework: Laravel
* Environment: Laravel Sail (Docker)
* Database: MySQL / Eloquent ORM
