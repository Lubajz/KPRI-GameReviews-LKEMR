# KPRI - Semestrální práce 
## Luboš Kemr

Aplikace pro nahrávání krátkých recenzí a hodnocení videoher v podobě XML souborů.

## Funkcionality

### Přihlášení
Možnost nahrání recenzí se zobrazí po úspěšném přihlášení uživatele na stránce _**Sign In**_. Kontrola uživatele probíhá pomocí souboru s uživateli _**'./xml/users.xml'**_ v _**login_action.php**_.
Zatím je připraven jeden testovací uživatel LKemr a heslo test.

### Nahrání recenze
Jak již bylo zmíněno po úspěšném přihlášení se objeví v navigaci stránka pro nahrání recenze _**Upload Review**_. Zde je možné nahrát soubor s recenzemi v dané .xml struktuře. Samotné nahrání, validace a transformace probíhá v _**upload_action.php**_.
Ve složce **test_data** jsem připravil testovací data ve správném formátu soubor _**games.xml**_ a data ve špatném formátu _**games_error.xml**_. V případě neúspěchu by měla vyskočit toastr error hláška. V případě úspěch success toastr hláška.

### Prohlížení recenzí
Po nahrání je možné recenze zobrazit na stránce _**Reviews**_. Samotné načítání recenzí probíhá v _**load_reviews.php**_.

