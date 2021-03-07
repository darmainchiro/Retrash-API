# Travelin

## How to Run

1 Setup env file

```
cp .env.example .env

vi .env
APP_KEY=

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
DB_ROOT_PASS=

PROJECT_NAME=retrash-api
BRANCH=<edit-your-branch-here>
VERSION=latest
```

2 Run MySQL Database

```bash
make run-db
```

3 Build Application Environment

```bash
make build-dev
```

4 Run Migration Database

```bash
make run-shell-dev
php composer.phar install
php artisan migrate
```

5 Run Application

```bash
make run-daemon-dev
```

6 Run testing

```bash
bash api-test.sh
```
