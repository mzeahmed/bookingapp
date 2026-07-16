# BookingApp

[![PHP Version](https://img.shields.io/badge/PHP-8.4+-777BB4?logo=php&logoColor=white)](https://github.com/mzeahmed/bookingapp/blob/main/app/composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-8.0-000000?logo=symfony&logoColor=white)](https://symfony.com)
[![MariaDB](https://img.shields.io/badge/MariaDB-11-003545?logo=mariadb&logoColor=white)](https://mariadb.org)
[![Docker](https://img.shields.io/badge/Docker-Compose-2496ED?logo=docker&logoColor=white)](https://www.docker.com)
[![Traefik](https://img.shields.io/badge/Traefik-v3-24A1C1?logo=traefikproxy&logoColor=white)](https://traefik.io)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg)](#license)

A modern room and workspace booking platform built with Symfony.

The project is designed as a real-world application to practice advanced Symfony concepts including:

* Routing
* Security
* Doctrine ORM
* Forms
* Validation
* Event Dispatcher
* Messenger
* Mailer
* Voters
* Functional Testing
* Docker
* Traefik
* HTTPS Local Development

---

## Project Goals

BookingApp allows users to:

* Register and authenticate
* Browse available rooms
* Manage bookings
* Leave reviews
* Receive notifications
* Manage their profile

Administrators can:

* Manage rooms
* Manage bookings
* Manage users
* Access statistics

---

## Tech Stack

### Backend

* PHP 8.3+
* Symfony 8
* Doctrine ORM
* Twig
* Symfony Security
* Symfony Messenger
* Symfony Mailer

### Infrastructure

* Docker Compose
* Traefik v3
* Nginx
* MariaDB 11
* Redis
* Mailpit

### Quality

* PHPStan
* PHP CS Fixer
* Rector
* PHPUnit

---

## Local Domains

The application uses HTTPS locally.

Available domains:

```text
https://bookingapp.local
https://mail.bookingapp.local
https://db.bookingapp.local
```

Traefik sits in front of the stack as a reverse proxy. It:

* Terminates HTTPS using the local certificates generated with mkcert.
* Redirects all HTTP traffic to HTTPS.
* Routes each domain to the right container based on Host rules declared as
  Docker labels in `docker-compose.yml` (e.g. `bookingapp.local` -> nginx,
  `mail.bookingapp.local` -> Mailpit).

This avoids exposing container ports directly and lets multiple services
share ports 80/443 under different local domains.

These domains do not resolve on their own: you need to edit `/etc/hosts` to
point them to `127.0.0.1` (see [Configure Hosts](#configure-hosts)).

---

## Requirements

* Docker
* Docker Compose
* GNU Make
* mkcert

---

## Installation

### Clone the repository

```bash
git clone git@github.com:your-org/bookingapp.git

cd bookingapp
```

### Configure Git Hooks

```bash
make setup
```

### Install Local SSL Authority

```bash
mkcert -install
```

### Generate Local Certificates

```bash
mkdir -p certs

cd certs

mkcert bookingapp.local "*.bookingapp.local"
```

### Configure Hosts

```bash
make hosts
```

This adds the required domains to `/etc/hosts` (asks for your `sudo`
password) and is safe to run multiple times: entries already present are
left untouched.

To do it manually instead, edit `/etc/hosts` and add:

```text
127.0.0.1 bookingapp.local
127.0.0.1 mail.bookingapp.local
127.0.0.1 db.bookingapp.local
```

### Start the Environment

```bash
make up
```

Application:

```text
https://bookingapp.local
```

Traefik Dashboard:

```text
http://localhost:8080
```

---

## Make Commands

### Display Available Commands

```bash
make help
```

### Build Containers

```bash
make build
```

### Start Containers

```bash
make up
```

### Stop Containers

```bash
make down
```

### Restart Environment

```bash
make restart
```

### View Logs

```bash
make logs
```

### List Containers

```bash
make ps
```

### Access PHP Container

```bash
make bash
```

### Run Code Style Check

```bash
make cs
```

### Fix Code Style Issues

```bash
make csf
```

### Run Static Analysis

```bash
make stan
```

### Run Rector (Check Mode)

```bash
make rector-check
```

### Run Rector (Apply Refactorings)

```bash
make rector
```

---

## Database

### Create Database

```bash
php bin/console doctrine:database:create
```

### Generate Migration

```bash
php bin/console make:migration
```

### Execute Migration

```bash
php bin/console doctrine:migrations:migrate
```

---

## Mailpit

Mailpit captures all outgoing emails.

Access:

```text
https://mail.bookingapp.local
```

Use cases:

* Password reset
* Email verification
* Booking notifications

---

## Redis

Redis is used for:

* Cache
* Sessions
* Messenger transports
* Rate limiting

---

## Development Workflow

### Create a New Feature

1. Create a feature branch.
2. Develop the feature.
3. Run static analysis.

```bash
make stan
```

4. Run coding standards.

```bash
make cs
```

5. Submit a pull request.

---

## Project Structure

```text
bookingapp/

├── docker/
│   ├── nginx/
│   └── php/
│
├── certs/
│
├── docs/
│
├── app/
│   ├── config/
│   ├── migrations/
│   ├── public/
│   ├── src/
│   ├── templates/
│   ├── tests/
│   └── var/
│
├── docker-compose.yml
├── Makefile
└── README.md
```

---

## Learning Objectives

This project is intentionally designed to cover a large portion of the Symfony ecosystem:

* Dependency Injection
* Routing
* Controllers
* Security
* Forms
* Validation
* Doctrine
* Messenger
* Mailer
* Event Dispatcher
* Testing

It serves both as a learning platform and as a portfolio project.

---

## License

MIT
