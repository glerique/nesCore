# Contributing to nesCore

Thank you for your interest in contributing to nesCore!

## Getting Started

1. Read [README.md](README.md) for setup instructions
2. Read [CLAUDE.md](CLAUDE.md) for code standards
3. Follow the guidelines below

## Code Standards

### Principles

- **SOLID**: Write maintainable, testable code
- **KISS**: Keep it simple, stupid - avoid over-engineering
- **DRY**: Don't repeat yourself
- **Clean Code**: Make code readable and intentional

### Style Guide

- Follow PSR-12 coding standard (enforced by PHP-CS-Fixer)
- Use strict types: `declare(strict_types=1);`
- Type hints for all function parameters and returns
- Maximum line length: 80 characters
- Snake case for variables and methods (PSR-12 convention)

### Testing

- Write tests for all new features
- Maintain test coverage for critical paths
- Use PHPUnit for testing
- Run tests before committing

### Commits

Use **Conventional Commits** format:

```
<type>(<scope>): <subject>
```

**Types**:
- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation
- `style`: Code style (formatting, whitespace)
- `refactor`: Code refactoring
- `test`: Tests
- `chore`: Maintenance, dependencies
- `ci`: CI/CD configuration

**Examples**:
```
feat(router): add route groups support
fix(database): correct connection pooling
docs: update API documentation
style: format src/Router.php
test: add router integration tests
chore(deps): upgrade phpunit to 11.0
```

## Pull Request Process

1. Create a feature branch: `git checkout -b feature/description`
2. Make your changes with meaningful commits
3. Run quality checks:
   ```bash
   docker compose exec frankenphp ./vendor/bin/phpunit
   docker compose exec frankenphp ./vendor/bin/phpstan analyse src/
   docker compose exec frankenphp ./vendor/bin/php-cs-fixer fix . --allow-risky=yes
   ```
4. Ensure all tests pass
5. Create a pull request with a clear description

## Code Review

- Be open to feedback
- Respond to comments constructively
- Make requested changes in new commits (don't amend)
- Update PR description if scope changes

## Questions?

- Check existing documentation first
- Ask in pull request comments
- Be respectful and constructive

## License

By contributing, you agree your code will be licensed under the MIT License.
