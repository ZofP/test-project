## Test Project

## Features

User: Login, Register

Articles: Index, Create (Store), Show, Edit (Update)

## How to run the project with Docker Desktop

1. Clone or download the repository
2. Start Docker Desktop app
3. In command line (on Windows it shall not be Ubuntu/WSL2), run commands:
    1) cp .env.example .env
    2) php artisan key:generate
4. In command line (on Windows it must be Ubuntu/WSL2), navigate to the project folder, and run command: ./vendor/bin/sail up
5. In command line (on Windows it shall not be Ubuntu/WSL2), run command: php artisan migrate
6. Open the application in Docker Desktop
