# Socya

WIP, new version comming soon !

## How to run
Clone the project and run the following commands:

```bash
cp .env.example .env
make build
make composer arg=install
make npm arg=install
make artisan arg="key:generate"
make artisan arg=migrate
make up
```

When the containers are up, you can access the app at http://localhost
