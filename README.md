# nesCore

A lightweight, object-oriented PHP micro-framework built from scratch. Designed for learning and applying SOLID principles, design patterns, and clean architecture.

## Quick Start

### Prerequisites
- Docker & Docker Compose
- Git

### Setup

1. Clone the repository:
```bash
git clone <repo-url>
cd nesCore
```

2. Start the environment:
```bash
docker compose up -d --build
```

3. Verify installation:
```bash
docker compose ps
curl http://localhost:8080/health
```

Access the application at http://localhost:8080

### Database Access

Access the database via Adminer at http://localhost:8081:
- Server: `mariadb`
- Username: `nescore`
- Password: `nescore`
- Database: `nescore`

## Development

### Commands

```bash
# Run tests
docker compose exec frankenphp ./vendor/bin/phpunit

# Code analysis
docker compose exec frankenphp ./vendor/bin/phpstan analyse src/

# Format code
docker compose exec frankenphp ./vendor/bin/php-cs-fixer fix .

# Stop environment
docker compose down
docker compose down -v  # Also remove database volume
```

### Environment Configuration

The `.env` file contains public configuration. Database credentials are in `.env.local` (not tracked in git for security).

Copy `.env.local` template if needed:
```bash
cp .env.local.example .env.local
```

Then edit with your local credentials.

### Troubleshooting

**Container won't start:**
```bash
docker compose logs frankenphp
docker compose down && docker compose up -d --build
```

**Port already in use:**
Change ports in `docker-compose.yaml` or kill the process using the port.

**Database connection errors:**
Verify MariaDB is running and credentials in `.env` match `docker-compose.yaml`.

## Technology Stack

- **Language**: PHP 8.4+
- **Runtime**: FrankenPHP
- **Database**: MariaDB
- **Web Server**: Caddy
- **Testing**: PHPUnit
- **Analysis**: PHPStan
- **Formatting**: PHP-CS-Fixer

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines.

## License

MIT License - See LICENSE file for details

## Resources

- [CLAUDE.md](CLAUDE.md) - AI assistant guidelines
- [CONTRIBUTING.md](CONTRIBUTING.md) - Contributing guidelines
