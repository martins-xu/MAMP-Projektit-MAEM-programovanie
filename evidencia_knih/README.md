# Evidencia kníh

Toto je jednoduchá mini webová aplikácia vytvorená v jazyku PHP. Aplikácia používa databázu MySQL a pripojenie pomocou `mysqli`.

Projekt sme vytvorili ako školskú prácu na precvičenie práce s databázou, formulármi a základnými CRUD operáciami.

## Čo aplikácia robí

Aplikácia slúži na evidenciu kníh.

Používateľ môže:

- pridať novú knihu,
- zobraziť zoznam kníh,
- upraviť existujúcu knihu,
- vymazať knihu.

Každá kniha má názov, rok vydania a autora.

## Použité technológie

- PHP
- MySQL
- mysqli
- HTML
- CSS
- GitHub

## Databáza

Projekt používa databázu s názvom:

`evidencia_knih`

Databáza obsahuje dve tabuľky:

- `authors`
- `books`

### Tabuľka `authors`

Tabuľka `authors` obsahuje autorov kníh.

Stĺpce:

- `id` – jedinečné ID autora
- `name` – meno autora

### Tabuľka `books`

Tabuľka `books` obsahuje knihy.

Stĺpce:

- `id` – jedinečné ID knihy
- `title` – názov knihy
- `year` – rok vydania knihy
- `author_id` – ID autora z tabuľky `authors`

## Vzťah medzi tabuľkami

Tabuľky `authors` a `books` sú prepojené pomocou stĺpca `author_id`.

Vzťah medzi tabuľkami je:

- jeden autor môže mať viac kníh,
- jedna kniha patrí jednému autorovi.

V aplikácii sa pri pridávaní alebo úprave knihy vyberá autor zo zoznamu autorov, ktorí sú uložený v tabuľke `authors`.

## SQL skript

Súčasťou projektu je súbor:

`database.sql`

Tento súbor vytvorí:

- databázu,
- tabuľku `authors`,
- tabuľku `books`,
- testovacie dáta pre autorov a knihy.

## CRUD operácie

Aplikácia obsahuje základné CRUD operácie.

### Create

Pridanie novej knihy cez formulár.

Používateľ zadá:

- názov knihy,
- rok vydania,
- autora.

Dáta sa spracujú pomocou metódy `POST` a následne sa vložia do databázy pomocou SQL príkazu `INSERT`.

### Read

Zobrazenie kníh v tabuľke.

Knihy sa načítajú z databázy pomocou SQL príkazu `SELECT`.

Používa sa aj `JOIN`, aby sa ku každej knihe zobrazilo meno autora z tabuľky `authors`.

### Update

Úprava existujúcej knihy.

Používateľ klikne na možnosť `Upraviť`. Otvorí sa formulár, v ktorom sú predvyplnené údaje vybranej knihy.

Po odoslaní formulára sa údaje aktualizujú v databáze pomocou SQL príkazu `UPDATE`.

### Delete

Vymazanie knihy.

Používateľ klikne na možnosť `Vymazať`. Po potvrdení sa kniha vymaže z databázy pomocou SQL príkazu `DELETE`.

## Formuláre a spracovanie dát

Aplikácia používa HTML formuláre.

Formuláre sa spracúvajú pomocou PHP:

- pri pridávaní knihy sa používa metóda `POST`,
- pri úprave a mazaní knihy sa používa ID knihy z URL cez `GET`.

## Validácia vstupov

Aplikácia obsahuje základnú validáciu vstupov.

Kontroluje sa:

- či sú vyplnené všetky polia,
- či je rok vydania zadaný ako číslo.

Ak používateľ zadá nesprávne údaje, zobrazí sa chybová správa.

## Súbory projektu

```text
evidencia-knih/
├── config.php
├── index.php
├── edit.php
├── delete.php
├── style.css
├── database.sql
└── README.md