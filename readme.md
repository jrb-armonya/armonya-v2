# ARMONYA V2

- Gestion Utilisateurs
- Gestion Roles
- Gestion Permission
- Gestion Fiches
- Gestion Factures

## v2.1

- Doublons (Job dispatched with ajax route) (NOT DONE)
- Recherche par numéro (fix, mobile et bureau) (DONE)
- Actions (fixed)
- Refactoring Rapports
- Generation des factures (DONE)

## 24-03-2019

<!-- update the local version: -->

- create jobs_table_migration
- create doublons_table_migration
- create Doublons Model with \$fillable[]
- create \App\jobs\SearchDoublons (maybe we change the name to 'SearchDoublonsJobs')
- change the search-doublons code from web/routes to App\Http\Controllers\Doublons\DoublonsController@searchDoublons
- create an ajax route to DoublonsController@searchDoublons
- create the view to display the doublons (view('app.doublons.doublons.index')) \$doublons = Doublons::where('is_not', 0);
- create 2 routes: "delete doublon \$doublon->is_not = 1" and "pas doublon"

### App\Http\Controllers\Doublons\DoublonsController
function searchDoublons => dispatch the \App\jobs\SearchDoublons

# 08/10/2019

new WORK!

====================================

# V2.9

# 07/11/2019

====================================

# Views

## Input

Input Date: day, mouth, year.
Input Heure.
Select accepts Collection or Array.
Input text
Input email
Input phone
Input Radio
Input Checkbox
Input IP
Text Area
Select2 Tags from list.
Select2 Tags and possibility to add to database.

## Card

Card Header with id and class
Card Body with id and class
Card Footer with id and class
3 points top Right of the Card (widget-action-link)
Card Type (Admin / Repport / )

## Widgets ??

Peut etre on utilisera juste les cards specifiques.

Admin Widget with types.

## Menu

Menu : accepts pages in ul.
Status: accepts all status in ul.

## Tables

With id and class
Accept Columns and data type from <Collection> or Ajax.

## Buttons

Delete (with icon)
Loop to see a Fiche (with icon)

## Badge

Badge Number (petit + couleur)
Badge String (grand + couleur)

## Modal

Modal: id, class et contenu.

## Dropdown

It can be with class (for size), id and content (dropdown-item)
It can be with it's JS too when fired events.

## Historique

Generate Historique with Actions.
Icons, User, Status and color.

## EMAILS

Email Partenaire Confirm Fiche
Email Annulation Fiche
Email Creation Espace Partenaire

## Icons

Burger (droite haut)
Profile
Dashboard
Nouvelle Fiche
Configuration
Rapports
Facturation
Archive
Doublons
Application
Crée(s)
A Ecouter
Confirmé
A Reporter
Prospect
Adresse
Situation
Impot
Crédits
Confirmation
Commentaire
CR
Synthèse
Moyenne J+
Groups
Agent (different de profil)
