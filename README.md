# Jednoduchá knižnica košíka v PHP

Dokonči a otestuj jednoduchú PHP knižnicu košíka. 

V priečinku `src/` sú dve triedy:

- `ShoppingCart` - hlavná trieda, ktorá obsahuje metódy na spravovanie obsahu košíka; treba ju implementovať podľa interface `ShoppingCartInterface`
- `ShoppingCartItem` - reprezentuje 1 položku v košíku; stačí ak bude obsahovať vlastnosti `id`, `name`, `price` a `quantity`, voliteľne nejaké metódy na prácu s týmito vlastnosťami

Triedu `ShoppingCart` bude treba otestovať pomocou feature/unit testov cez testovací framework [Pest](https://pestphp.com/). Pest je predinštalovaný cez Composer, stačí ho spustiť pomocou príkazu `./vendor/bin/pest`.

Kód nie je potrebné napájať na databázu, ani ho nie je potrebné spúšťať cez web server alebo CLI. Stačí ak ho otestuješ cez Pest.

_**Bonusová otázka:**_ Spĺňa takto napísaný kód princípy SRP (Single Responsibility Principle)?