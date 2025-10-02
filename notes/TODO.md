# DOLEZITE

# TODO

- preklady 
  - upravit podla nastavenia z .env.
    - Ak nebude nastavena vyberie podla nastavenia systemu
    - Ak bude tak prvy jazyk bude ako hlavny.
      - moze nastat situacia ze jazyk systemu bude SK ale zakladny jazyk stranky v CZ

- testy (In progress)

- vytvorit nastavenia pre web
  - najake default nastavenia ako su kontaktne udaje, fakturacne udaje, odkazy na socialne media a pod 

- users/admins
  - form: generovanie hesla (js)
  - odoslanie emailu po vytvoreni
  - vyzadovana zmena hesla pri prvom prihlaseni
  - zablokvanie pristupu
  - role/opravnenia

- preklady (Ciastocne -> potrebne skontrolovat)
- admin navbar: pri mobilnej verzii
- logovanie

# Vylepsenia 
- pull mozny len ak bola nejaka zmena (farebne rozlisit)
- presunut ContentStatus z modelu (stranka, clanok, ...) do SeoData
  - zbavim sa tak 'trait' pre overenie ci bol dany model zverejneny alebo nie a zaroven sa zjednodusi overenie .. ?? aj pre menu ??
