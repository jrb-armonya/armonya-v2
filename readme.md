# ARMONYA V2

* Gestion Utilisateurs
* Gestion Roles
* Gestion Permission
* Gestion Fiches
* Gestion Factures

## v2.1

* Doublons (Job dispatched with ajax route) (NOT DONE)
* Recherche par numéro (fix, mobile et bureau) (DONE)
* Actions (fixed)
* Refactoring Rapports
* Generation des factures (DONE)

## 24-03-2019
<!-- update the local version: -->
* create jobs_table_migration
* create doublons_table_migration
* create Doublons Model with $fillable[]
* create \App\jobs\SearchDoublons (maybe we change the name to 'SearchDoublonsJobs')
* change the search-doublons code from web/routes to App\Http\Controllers\Doublons\DoublonsController@searchDoublons
* create an ajax route to DoublonsController@searchDoublons
* create the view to display the doublons (view('app.doublons.doublons.index')) $doublons = Doublons::where('is_not', 0);
* create 2 routes: "delete doublon $doublon->is_not = 1" and "pas doublon"

### App\Http\Controllers\Doublons\DoublonsController
function searchDoublons => dispatch the \App\jobs\SearchDoublons


# 08/10/2019
new WORK!