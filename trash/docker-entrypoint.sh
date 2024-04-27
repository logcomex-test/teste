#!/bin/bash

# Função para esperar a disponibilidade do MySQL
wait_for_mysql() {
    until mysql -u root -p root -e "status"; do
        >&2 echo "MySQL não está disponível - esperando..."
        sleep 1
    done
}

# Esperar até que o MySQL esteja disponível
wait_for_mysql

# Executa as migrações do banco de dados
php artisan migrate --force

# Executa o seeder do banco de dados
php artisan db:seed --class=UsersSeeder

# Inicia o servidor Apache
exec apache2-foreground
