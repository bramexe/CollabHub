# CollabHub

Dit README.md bestand is gegenereed door AI, het project is geprogrammeerd door Bram Neij uit klas 24B, AI is alleen gebruikt voor eventuele kleine css onderdelen aangezien ik een back-end developer ben. 

CollabHub is een PHP/MySQL-platform voor samenwerking tussen makers, influencers, campaignmanagers en creatieve professionals. Gebruikers kunnen een account aanmaken, hun profiel opbouwen, zoeken naar talent op basis van specialisatie en campagnes beheren of deelnemen aan uitnodigingen.

Je kan zelf een account aanmaken of de bestaande accounts gebruiken
creator@hotmail.com
wachtwoord: 1234

manager@hotmail.com
wachtwoord: 1234

## Projectbeschrijving

Het project is ontworpen als een eenvoudig sociaal/collaboratieplatform waarin mensen kunnen:

- registreren en inloggen
- hun profiel invullen en aanpassen
- zoeken naar andere gebruikers op basis van specialty en rol
- beschikbaarheid beheren
- campagnes aanmaken of deelnemen aan campagnes van anderen
- meldingen en uitnodigingen inzien

## Vereisten

- XAMPP of vergelijkbare lokale PHP/MySQL-omgeving
- Apache + MySQL ingeschakeld
- PHP 8.x

## Hoe te starten

1. Installeer XAMPP en start Apache en MySQL.
2. Plaats deze projectmap in:
   `C:\xampp\htdocs\CollabHub`
3. Maak in phpMyAdmin of via MySQL een database aan met de naam:
   `collabhub`
4. Importeer het bestand:
   `collabhub.sql`
5. Open de app in je browser:
   `http://localhost/CollabHub/`

## Databaseconfiguratie

De applicatie maakt standaard verbinding met MySQL via:

- host: `localhost`
- database: `collabhub`
- gebruiker: `root`
- wachtwoord: `''` (leeg)

Als je je databasegegevens wijzigt, pas dit dan aan in:
`classes/dbh.class.php`

## Gebruik

- Maak een account aan via het registratieformulier.
- Log in vanaf de hoofdpagina.
- Bekijk je dashboard en profiel.
- Zoek naar gebruikers op specialty of rol.
- Beheer je beschikbaarheid en campagne-invites.
- Gebruik de verschillende pagina's om campagnes te maken of mee te doen.

## Opmerking

Dit is een lokaal ontwikkelproject. Voor productiegebruik is extra beveiliging, validatie en een beter databasedesign aanbevolen.

## Rollen en rechten

CollabHub werkt met verschillende rollen. Welke onderdelen iemand kan openen, hangt af van de rol waarmee die gebruiker is ingelogd. 

### Campagnemanager

Een campagnemanager(manager) kan campagnes aanmaken en beheren. Ook kunnen zij creators uitnodigen voor hun campagne.
Campagnemanagers hebben in de header navigatie een extra knopje, een plusje waarmee zij campagnes kunnen aanmaken. Ook hebben zij in hun 'my_campaigns.php' de optie om dingen te wijzigen.

### Creators
Creators kunnen geen campagnes maken, beheren of anderen uitnodigen.

### Admin
Admins hebben in hun header navigation een extra knopje met een gebruiker icoontje en een tandwiel, deze word gebruikt om alle gebruikers te bekijken.
