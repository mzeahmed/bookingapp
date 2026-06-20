# Database Design

## Overview

BookingApp uses MariaDB as its primary database.

All entities use UUID identifiers.

## Entity Relationship Diagram

```text
User
 │
 ├── Reservations
 └── Reviews

Room
 │
 ├── Reservations
 ├── Reviews
 ├── Images
 └── Equipments

Reservation
 │
 ├── User
 └── Room

Review
 │
 ├── User
 └── Room
```

## Tables

### users

| Column      | Type     |
| ----------- | -------- |
| id          | UUID     |
| email       | VARCHAR  |
| password    | VARCHAR  |
| first_name  | VARCHAR  |
| last_name   | VARCHAR  |
| roles       | JSON     |
| is_verified | BOOLEAN  |
| created_at  | DATETIME |
| updated_at  | DATETIME |

---

### rooms

| Column       | Type     |
| ------------ | -------- |
| id           | UUID     |
| name         | VARCHAR  |
| description  | TEXT     |
| capacity     | INT      |
| hourly_price | DECIMAL  |
| address      | VARCHAR  |
| city         | VARCHAR  |
| postal_code  | VARCHAR  |
| created_at   | DATETIME |
| updated_at   | DATETIME |

---

### reservations

| Column      | Type     |
| ----------- | -------- |
| id          | UUID     |
| room_id     | UUID     |
| user_id     | UUID     |
| start_date  | DATETIME |
| end_date    | DATETIME |
| total_price | DECIMAL  |
| status      | VARCHAR  |

Status values:

* pending
* confirmed
* cancelled
* completed

---

### reviews

| Column  | Type |
| ------- | ---- |
| id      | UUID |
| room_id | UUID |
| user_id | UUID |
| rating  | INT  |
| comment | TEXT |

## Indexes

Recommended indexes:

* users.email
* reservations.room_id
* reservations.user_id
* reservations.start_date
* reservations.end_date

## Constraints

* One review per user per room.
* Reservation dates must not overlap.