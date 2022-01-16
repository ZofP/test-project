## Test Project

## Features

User: Login, Register

Articles: Index, Create (Store), Show, Edit (Update)

## How to run the project with Docker Desktop

1. Clone the repository (on Windows - use this modified command for cloning: git clone https://github.com/ZofP/test-project.git --config core.autocrlf=input )
3. Start Docker Desktop app
4. In command line (on Windows it shall NOT be Ubuntu/WSL2), navigate to the project folder and run command: cp .env.example .env && composer install && php artisan key:generate && npm install && npm run dev
5. In command line (on Windows it must be Ubuntu/WSL2), navigate to the project folder, and run command: ./vendor/bin/sail up
6. In command line (on Windows it shall NOT be Ubuntu/WSL2), navigate to the project folder and run command: php artisan migrate
7. Open the application in Docker Desktop
