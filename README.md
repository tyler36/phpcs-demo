# PHPCS demo <!-- omit in toc -->

## Setup

- Start a new `Laravel` project

```shell
laravel new phpcs-demo
cd phpcs-demo
```

- Add `DDEV` to project, accepting all default

```shell
$ ddev config
...
Configuration complete. You may now run 'ddev start'.
```

- Bump DDEV `PHP` version in `./.ddev/config.yaml`

```yaml
php_version: "8.0"
```

- Config Laravel `.env`

```env
APP_URL=https://phpcs-demo.ddev.site
DB_CONNECTION=mysql
DB_HOST=ddev-phpcs-demo-db
DB_DATABASE=db
DB_USERNAME=db
DB_PASSWORD=db
```

- Confirm <http://phpcs-demo.test>
- Check database if functioning

```shell
$ ddev . php artisan migrate
Migration table created successfully.
```
