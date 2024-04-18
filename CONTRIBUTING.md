# Contributing

## Develop envinronment

### Install composer

https://getcomposer.org/download/

### Setup git hooks

```sh
cd .git-hooks
make init
```

### PHPStan

```sh
composer phpstan
```

### Testing

- [Editor Setup](https://pestphp.com/docs/editor-setup)

```sh
composer test
```

## Directory Architecture

| path   |                      |     |     |
| ------ | -------------------- | --- | --- |
| `src/` | `domain/`            |     |     |
|        | `usecase/`           |     |     |
|        | `interface-adapter/` |     |     |
|        | `infrastructure/`    |     |     |
