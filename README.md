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
![Документация по апи](https://s600sas.storage.yandex.net/rdisk/271e3f133259152cdcff670e4483c7df22e99e77b2e5fe6c90bb4908293ebe7d/67d776d0/4qjwjCSSJHZ_iB9eiX0o85Q-4vXYEJrS1tn6DUbnKjtfQX9AjxPhsiu1sazl-sVvJhInua2zGlRrvj_2mr5Rrw==?uid=254938608&filename=Screenshot%20from%202025-03-16%2023-34-54.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=254938608&fsize=50907&hid=c82f9131852f863a1a94640733cf5e6a&media_type=image&tknv=v2&etag=cc6c6e7c06d482cc8a1264c088456739&ts=6307f78af5400&s=2bbb34da5dae70342d2484ac5cc7fe64d465fd36b1510ee72c78933ebb057f6e&pb=U2FsdGVkX19yd_9wU_nzvSTMcua35KawCxeael62LwOJ4SREnFAFdrUZi09qxlcsQZJ-k20f9_L4c5V6S-2E50rNIvvhiIx2eG5BMYa8Xgk)

Конкретный эндпоинт:
![Конкретный эндпоинт](https://s1117sas.storage.yandex.net/rdisk/9adca8a7aacff348a63cb300d49e69ceb2bf3d232c20c26bc57875327b5c9dfa/67d7770d/4qjwjCSSJHZ_iB9eiX0o85lWkhB-0otIYoWzcFpqOqKmalaTUlaYQVrmBaZGLaKB_gbYeHyEy1b1RD_ZwALG7A==?uid=254938608&filename=Screenshot%20from%202025-03-16%2023-35-49.png&disposition=inline&hash=&limit=0&content_type=image%2Fpng&owner_uid=254938608&fsize=53741&hid=f6e351e8895a774723cd2cb2ee7bbafe&media_type=image&tknv=v2&etag=dc09c4aca75b09a306ae07020339f32c&ts=6307f7c521d40&s=30fb9927074eca00fd5c54165562d74145cd131c811e5f338be6b0937486d662&pb=U2FsdGVkX1-zy4LHUFjNZZ3VvwDPSBDzXEyX9LnW8dzs2WIvmAQHHJA_unRKQoQ9qnKV9nDpWifNQhgJb0VOu-ILI0Pb-JHltsSmYBTVu58)

В папке app/src/Api/V1 хранится основной код по проекту: контроллеры, сущности, репозитории и пр. 
В папке app/src/DataFixtures хранятся тестовые данные, в том числе кредитные программы. Кредитные программы фиксируются в базе данных и конкретная кредитная определяются на основании срока и размера кредита.
