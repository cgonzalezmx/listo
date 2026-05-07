# Listo

![Status](https://img.shields.io/badge/status-work--in--progress-orange)

Open-source simple to-do list app build to create and manage checklists with
the hability to share them with other users to fill. It is developed because
other similar software was packed with too many features or sharing to-do lists
with other users for them to fill or complete them was complicated. The idea of
Listo is you create a checklist and then you or other person can complete it.

## Develpment

To start development clone the repo

```bash
git clone https://github.com/cgonzalezmx/listo.git
cd listo
composer install
pnpm install
```

Then run

```bash
php artisan serve
```

```bash
pnpm dev
```

## Roadmap

 - [x] Initial backend configuration
 - [x] Create database logic
 - [x] Implenent user autentication
 - [ ] CRUD checklists
 - [ ] Design the checklists dashboard
 - [ ] Implement websockets
 - [ ] Integrate an API
 - [ ] Dockerize app
