# AI Client Core

A proof of concept for the WordPress 7.0 WP AI Client core merge proposal.

## Features
- Provider-agnostic AI Registry.
- Standard `AI_Provider` interface.
- Mock AI Provider for testing.
- WP-CLI integration.

## Usage
```bash
wp ai chat "How does this work?" --provider=mock
```

## Development
```bash
composer install
composer test
```
