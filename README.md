# Техническое задание SBI Laravel

## Установка и сборка:

- `composer install` - установка зависимостей
- `php artisan key:generate` - генерация ключа приложения
- `php artisan migrate` - миграция базы данных

### Заполнение базы данных:
- `php artisan db:seed`

### Тестирование:
- `php artisan test` - запуск тестов

### Экспорт данных:
- `php artisan app:export-products` - запускэкспорт продуктов
- `php artisan queue:work` - работа очередей

файл будет доступен в директории storage/app/public/exports/products.xlsx
