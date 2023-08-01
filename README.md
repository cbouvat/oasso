# Socya

WIP, new version comming soon !

## How to run
Clone the project and run the following commands:

```bash
cp .env.example .env  
./vendor/bin/sail up
./vendor/bin/sail composer install
./vendor/bin/sail npm install
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm run build
```

When the containers are up, you can access the app at http://localhost
