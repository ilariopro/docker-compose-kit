# Docker Compose Kit

> ⚠️ This project is in an early development stage. Configurations may change. Feedback and contributions are welcome!

A modular **Docker Compose toolkit** for quickly building **dockerized environments**.

Use this project as a starting point to create, extend, and customize Docker Compose setups for PHP, Node.js, Python, databases, web servers, and common development tools.

## Features

- Modular architecture with consistent structure and naming convention: **Application**, **Infrastructure**, **Persistence**, and **Utility** layers. 
- Ready-to-use service definitions for PHP, Node.js, MySQL, PostgreSQL, Redis, RabbitMQ, Apache, Nginx, Adminer, Mailpit, and more.
- Example configuration for **MVC**, **decoupled frontend-backend**, and **microservices architectures**.
- Predefined shared network for easy inter-service communication.
- Minimal images by design; volumes allow mounting local code for **rapid development** and **customization**.

## Requirements

- Docker >= 24
- Docker Compose (v2 syntax, integrated with docker compose)
- Linux, macOS, or Windows with WSL2

## Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/ilariopro/docker-compose-kit.git
cd docker-compose-kit
```

### 2. Configure environment variables

Copy the example environment file and edit as needed:

```bash
cp .env.example .env
```

Adjust ports, credentials, versions, and other service-specific settings in `.env` (PHP, Node.js, MySQL, PostgreSQL, RabbitMQ, etc.).

### 3. Include and customize services

Open the root `docker-compose.yml`. Uncomment or add the service groups and examples relevant to your project:

```yaml
include:
  - ./docker/persistence/docker-compose.mysql.yml
  - ./docker/utility/docker-compose.adminer.yml
  - ./example/docker-compose.mvc.yml
```

You can mix and match services across **application**, **infrastructure**, **persistence**, and **utility** layers.

The [example](./example) directory contains Docker Compose configuration examples, you can also use these as starting points for your own projects.

### 4. Mount your application code

Volumes are used to mount your local code into containers for live development and hot-reloading:

```yaml
volumes:
  - ${PWD}/app:/var/www/html:Z
```

Make sure the `WORKDIR` in the Dockerfile matches the mount point.

### 5. Start the environment

Build and start all containers with:

```bash
docker compose up --build
```

The `--build` ensures any Dockerfile changes or image updates are applied. 

Once the containers are running, your services will be accessible on the ports defined in your `.env` file.

For example, if you included PHP, Apache, and Adminer:

```text
PHP backend:    http://localhost:9000
Web server:     http://localhost:8080
Adminer:        http://localhost:8081
```

You can adjust these ports in `.env` as needed. Changes to environment variables or mounted volumes will take effect the next time you start or rebuild the containers.

### 6. Customize for your project

- Add new services, override existing ones, or modify Dockerfiles in the `docker/` directory.
- Use the examples as templates for common architectures like **MVC**, **decoupled frontend/backend**, or **microservices**.
- Mount additional volumes if needed for configuration or static assets.

## License

This project is licensed under the MIT license. See [LICENSE](./LICENSE) for more information.
