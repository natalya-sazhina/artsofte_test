# Artsofte тестовое задание
Проект написан с использованием следующих технологий:
- PHP 8.2
- MariaDB
- Symfony
- Docker

## Установка

- Склонировать этот репозиторий на свой компьютер
- Поднять контейнеры
- Установить зависимости
- Выполнить миграции и заполнить тестовыми данными БД

Пошаговое выполнение:
```shell
git clone https://github.com/natalya-sazhina/artsofte_test.git
cd artsofte_test/docker
docker-compose up --build -d
docker exec -it artsofte-php-fpm bash
composer install
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

## Использование
По адресу http://localhost:8081/api/doc будет доступна документация по проекту. Отображены эндпоинты с описанием входящих параметров и выходных данных, есть возможность использования эндпонитов апи на этой странице

Документация по апи:
![Документация по апи](https://s600sas.storage.yandex.net/rdisk/f03765068b76f86745b1348cfeed82f42bf5c98b9dc289a83ccf02d8b295aaf7/67db3d76/4qjwjCSSJHZ_iB9eiX0o85Q-4vXYEJrS1tn6DUbnKjtfQX9AjxPhsiu1sazl-sVvJhInua2zGlRrvj_2mr5Rrw==?uid=254938608&filename=Screenshot%20from%202025-03-16%2023-34-54.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=254938608&fsize=50907&hid=c82f9131852f863a1a94640733cf5e6a&media_type=image&tknv=v2&etag=cc6c6e7c06d482cc8a1264c088456739&ts=630b91691c980&s=4a96f5a1aad58f04307adb964966cde5d41f573afb0146f83b5e67580f2bbff1&pb=U2FsdGVkX18EyhSYYI5U3iqa1MXsKrqZnPVwzTum1yEsVoKFFgv_2bFSYdLeHRlTkpGtY8ue-50NsVIZCRHeKsn4Oxlzq-6G59dT94snMw0)

Конкретный эндпоинт:
![Конкретный эндпоинт](https://s1117sas.storage.yandex.net/rdisk/377cabad1ac0cb65b29a57627a8a1c63d8667e179c53ff830365da67b650be86/67db3d53/4qjwjCSSJHZ_iB9eiX0o85lWkhB-0otIYoWzcFpqOqKmalaTUlaYQVrmBaZGLaKB_gbYeHyEy1b1RD_ZwALG7A==?uid=254938608&filename=Screenshot%20from%202025-03-16%2023-35-49.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=254938608&fsize=53741&hid=f6e351e8895a774723cd2cb2ee7bbafe&media_type=image&tknv=v2&etag=dc09c4aca75b09a306ae07020339f32c&ts=630b9147bbac0&s=9a6acc49d7f29b5458cad04d63261939d00ac2e374706e0e02d07372201a212c&pb=U2FsdGVkX19ds3zEqtEsja3A5gqG0zLmQjWLtcKEKiBaSvyUOY493UnABWUOs6dVJZtu32bCY1ilTDotjFjoFluTzgObO3F82WZaUiMXHgU)

В папке app/src/Api/V1 хранится основной код по проекту: контроллеры, сущности, репозитории и пр. 
В папке app/src/DataFixtures хранятся тестовые данные, в том числе кредитные программы. Кредитные программы фиксируются в базе данных, конкретная кредитная программа определяется на основании срока и размера кредита.

Помимо документации и фикстур можно выделить следующие
## Особенности проекта:
- При получении списка автомобилей реализована постраничная пагинация для увеличения скорости загрузки страниц
- Для расчета ежемесячной платы по кредиту использовалась формула аннуитетного платежа
- Добавлена валидация на все поля; обработаны крайние случаи, например, когда не найдена кредитная программа при расчете ежемесячного платежа по кредиту
