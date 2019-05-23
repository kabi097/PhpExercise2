## Opis
Projekt tabeli znajduje się w pliku migracji (katalog __migrations__). Obsługa relacji znajduje się w klasie __User.php__. 

## Instrukcja

1. Konfiguracja połączenia z MySQL w pliku ```.env```
2. ```php artisan migrate:fresh```
3. ```php artisan db:seed```
4. ```php artisan serve```

## Dokumentacja REST API
- ```GET http://localhost:8000/api/users``` - Lista użytkowników
    - ```&nazwa_pola=[wartosc]``` - filtrowanie
    - ```&search=[wartosc]``` - wyszukiwanie
    - ```&sort_by=[nazwa_pola]``` - sortowanie
    - ```&order=desc``` - odwrotna kolejność

- ```GET http://localhost:8000/api/users/{id}``` - Wyświetlanie informacji o użytkowniku
- ```PUT|PATCH http://localhost:8000/api/users/{id}``` - Aktualizacja danych użytkownika
- ```POST http://localhost:8000/api/users``` - Tworzenie nowego użytkownika
- ```DELETE http://localhost:8000/api/users/{id}``` - Kasowanie użytkownika