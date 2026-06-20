# Architecture

## Overview

BookingApp is a room and workspace reservation platform built with Symfony.

The project follows a layered architecture inspired by Domain-Driven Design principles while remaining simple enough for a learning project.

## High Level Architecture

```text
Browser
    │
    ▼
Traefik
    │
    ▼
Nginx
    │
    ▼
PHP-FPM
    │
    ▼
Symfony Application
    │
 ┌──┴──────────────┐
 ▼                 ▼

MariaDB          Redis
```

## Application Layers

```text
Controller
    │
    ▼
Form / Request Validation
    │
    ▼
Application Services
    │
    ▼
Doctrine Repositories
    │
    ▼
Database
```

## Core Modules

### Authentication

Responsible for:

* Registration
* Login
* Email Verification
* Password Reset

### Room Management

Responsible for:

* Room creation
* Room updates
* Room deletion
* Equipment management

### Reservations

Responsible for:

* Availability checks
* Reservation creation
* Reservation cancellation

### Reviews

Responsible for:

* User reviews
* Ratings

### Notifications

Responsible for:

* Email notifications
* Messenger integration

## Security

The application relies on:

* Symfony Security
* Voters
* Role-based authorization

Roles:

* ROLE_USER
* ROLE_MANAGER
* ROLE_ADMIN

## Async Processing

Messenger is used for:

* Email notifications
* Future background jobs

## Infrastructure

### MariaDB

Main relational database.

### Redis

Used for:

* Cache
* Messenger
* Sessions

### Mailpit

Used during development to inspect outgoing emails.

## Testing Strategy

### Unit Tests

Focus on:

* Domain services
* Business rules

### Functional Tests

Focus on:

* Authentication
* Reservations
* Room management

## Future Improvements

* API Platform
* OpenAPI documentation
* CQRS
* Event Sourcing experimentation