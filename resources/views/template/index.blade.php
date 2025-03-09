<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
<meta name="author" content="Dreamguys - Bootstrap Admin Template">
<meta name="robots" content="noindex, nofollow">
<title>Dreams Pos modèle d'administration</title>

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="main-wrapper">

<div class="header">

<div class="header-left active">
<a href="index.html" class="logo">
<img src="{{ asset('assets/img/logo.png') }}" alt="">
</a>
<a href="index.html" class="logo-small">
<img src="{{ asset('assets/img/logo-small.png') }}" alt="">
</a>
<a id="toggle_btn" href="javascript:void(0);">
</a>
</div>

<a id="mobile_btn" class="mobile_btn" href="#sidebar">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
</a>

<ul class="nav user-menu">

<li class="nav-item">
<div class="top-nav-search">
<a href="javascript:void(0);" class="responsive-search">
<i class="fa fa-search"></i>
</a>
<form action="#">
<div class="searchinputs">
<input type="text" placeholder="Rechercher ici ...">
<div class="search-addon">
<span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
</div>
</div>
<a class="btn" id="searchdiv"><img src="{{ asset('assets/img/icons/search.svg') }}" alt="img"></a>
</form>
</div>
</li>


<li class="nav-item dropdown has-arrow flag-nav">
<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
<img src="{{ asset('assets/img/flags/us1.png') }}" alt="" height="20">
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/img/flags/us.png') }}" alt="" height="16"> Anglais
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/img/flags/fr.png') }}" alt="" height="16"> Français
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/img/flags/es.png') }}" alt="" height="16"> Espagnol
</a>
<a href="javascript:void(0);" class="dropdown-item">
<img src="{{ asset('assets/img/flags/de.png') }}" alt="" height="16"> Allemand
</a>
</div>
</li>


<li class="nav-item dropdown">
<a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<img src="{{ asset('assets/img/icons/notification-bing.svg') }}" alt="img"> <span class="badge rounded-pill">4</span>
</a>
<div class="dropdown-menu notifications">
<div class="topnav-dropdown-header">
<span class="notification-title">Notifications</span>
<a href="javascript:void(0)" class="clear-noti"> Tout effacer </a>
</div>
<div class="noti-content">
<ul class="notification-list">
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="{{ asset('assets/img/profiles/avatar-02.jpg') }}">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">John Doe</span> a ajouté une nouvelle tâche <span class="noti-title">Réservation de rendez-vous patient</span></p>
<p class="noti-time"><span class="notification-time">Il y a 4 minutes</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="{{ asset('assets/img/profiles/avatar-03.jpg') }}">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Tarah Shropshire</span> a changé le nom de la tâche <span class="noti-title">Réservation de rendez-vous avec passerelle de paiement</span></p>
<p class="noti-time"><span class="notification-time">Il y a 6 minutes</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="{{ asset('assets/img/profiles/avatar-06.jpg') }}">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Misty Tison</span> a ajouté <span class="noti-title">Domenic Houston</span> et <span class="noti-title">Claire Mapes</span> au projet <span class="noti-title">Module médecin disponible</span></p>
<p class="noti-time"><span class="notification-time">Il y a 8 minutes</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="{{ asset('assets/img/profiles/avatar-17.jpg') }}">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Rolland Webber</span> a terminé la tâche <span class="noti-title">Vidéoconférence patient et médecin</span></p>
<p class="noti-time"><span class="notification-time">Il y a 12 minutes</span></p>
</div>
</div>
</a>
</li>
<li class="notification-message">
<a href="activities.html">
<div class="media d-flex">
<span class="avatar flex-shrink-0">
<img alt="" src="{{ asset('assets/img/profiles/avatar-13.jpg') }}">
</span>
<div class="media-body flex-grow-1">
<p class="noti-details"><span class="noti-title">Bernardo Galaviz</span> a ajouté une nouvelle tâche <span class="noti-title">Module de chat privé</span></p>
<p class="noti-time"><span class="notification-time">Il y a 2 jours</span></p>
</div>
</div>
</a>
</li>
</ul>
</div>
<div class="topnav-dropdown-footer">
<a href="activities.html">Voir toutes les notifications</a>
</div>
</div>
</li>

<li class="nav-item dropdown has-arrow main-drop">
<a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
<span class="user-img"><img src="{{ asset('assets/img/profiles/avator1.jpg') }}" alt="">
<span class="status online"></span></span>
</a>
<div class="dropdown-menu menu-drop-user">
<div class="profilename">
<div class="profileset">
<span class="user-img"><img src="{{ asset('assets/img/profiles/avator1.jpg') }}" alt="">
<span class="status online"></span></span>
<div class="profilesets">
<h6>John Doe</h6>
<h5>Administrateur</h5>
</div>
</div>
<hr class="m-0">
<a class="dropdown-item" href="profile.html"> <i class="me-2" data-feather="user"></i> Mon Profil</a>
<a class="dropdown-item" href="generalsettings.html"><i class="me-2" data-feather="settings"></i>Paramètres</a>
<hr class="m-0">
<a class="dropdown-item logout pb-0" href="signin.html"><img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Déconnexion</a>
</div>
</div>
</li>
</ul>


<div class="dropdown mobile-user-menu">
<a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
<div class="dropdown-menu dropdown-menu-right">
<a class="dropdown-item" href="profile.html">Mon Profil</a>
<a class="dropdown-item" href="generalsettings.html">Paramètres</a>
<a class="dropdown-item" href="signin.html">Déconnexion</a>
</div>
</div>

</div>


<div class="sidebar" id="sidebar">
<div class="sidebar-inner slimscroll">
<div id="sidebar-menu" class="sidebar-menu">
<ul>
<li class="active">
<a href="index.html"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span> Tableau de bord</span> </a>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> Produit</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="productlist">Liste des produits</a></li>
<li><a href="addproduct">Ajouter un produit</a></li>
<li><a href="categorylist">Liste des catégories</a></li>
<li><a href="addcategory">Ajouter une catégorie</a></li>
<li><a href="subcategorylist">Liste des sous-catégories</a></li>
<li><a href="subaddcategory">Ajouter une sous-catégorie</a></li>
<li><a href="brandlist">Liste des marques</a></li>
<li><a href="addbrand">Ajouter une marque</a></li>
<li><a href="importproduct">Importer des produits</a></li>
<li><a href="barcode">Imprimer le code-barres</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/sales1.svg') }}" alt="img"><span> Ventes</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="saleslist">Liste des ventes</a></li>
<li><a href="pos">PDV</a></li>
<li><a href="pos">Nouvelles ventes</a></li>
<li><a href="salesreturnlists">Liste des retours de ventes</a></li>
<li><a href="createsalesreturns">Nouveau retour de vente</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/purchase1.svg') }}" alt="img"><span> Achat</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="purchaselist">Liste des achats</a></li>
<li><a href="addpurchase">Ajouter un achat</a></li>
<li><a href="importpurchase">Importer un achat</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/expense1.svg') }}" alt="img"><span> Dépense</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="expenselist">Liste des dépenses</a></li>
<li><a href="createexpense">Ajouter une dépense</a></li>
<li><a href="expensecategory">Catégorie de dépenses</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/quotation1.svg') }}" alt="img"><span> Devis</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="quotationList">Liste des devis</a></li>
 <li><a href="addquotation">Ajouter un devis</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/transfer1.svg') }}" alt="img"><span> Transfert</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="transferlist">Liste des transferts</a></li>
<li><a href="addtransfer">Ajouter un transfert</a></li>
<li><a href="importtransfer">Importer un transfert</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/return1.svg') }}" alt="img"><span> Retour</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="salesreturnlist.">Liste des retours de ventes</a></li>
<li><a href="createsalesreturn.">Ajouter un retour de vente</a></li>
<li><a href="purchasereturnlist.">Liste des retours d'achats</a></li>
<li><a href="createpurchasereturn.">Ajouter un retour d'achat</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img"><span> Personnes</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="customerlist">Liste des formateur</a></li>
<li><a href="{{route('users.create')}}">Ajouter un formateur</a></li>
<li><a href="supplierlist">Liste des fournisseurs</a></li>
<li><a href="addsupplier">Ajouter un fournisseur</a></li>
<li><a href="userlist">Liste des utilisateurs</a></li>
<li><a href="{{route('users.create')}}">Ajouter un utilisateur</a></li>
<li><a href="storelist">Liste des magasins</a></li>
<li><a href="addstore">Ajouter un magasin</a></li>
</ul>
</li> <li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/places.svg') }}" alt="img"><span> Lieux</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="newcountry">Nouveau pays</a></li>
<li><a href="countrieslist">Liste des pays</a></li>
<li><a href="newstate">Nouvel état</a></li>
<li><a href="statelist">Liste des états</a></li>
</ul>
</li>
<li>
<a href="components"><i data-feather="layers"></i><span> Composants</span> </a>
</li>
<li>
<!-- <a href="blankpage"><i data-feather="file"></i><span> Page vierge</span> </a> -->
</li>
<li class="submenu">
<!-- <a href="javascript:void(0);"><i data-feather="alert-octagon"></i> <span> Pages d'erreur</span> <span class="menu-arrow"></span></a> -->
<ul>
<li><a href="error-404.">Erreur 404</a></li>
<li><a href="error-500.">Erreur 500</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="box"></i> <span>Éléments</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="sweetalerts">Alertes douces</a></li>
<li><a href="tooltip">Info-bulle</a></li>
<li><a href="popover">Popover</a></li>
<li><a href="ribbon">Ruban</a></li>
<li><a href="clipboard">Presse-papiers</a></li>
<li><a href="drag-drop.">Glisser & Déposer</a></li>
<li><a href="rangeslider.">Curseur de plage</a></li>
<li><a href="rating.">Évaluation</a></li>
<li><a href="toastr.">Toastr</a></li>
<li><a href="text-editor.">Éditeur de texte</a></li>
<li><a href="counter.">Compteur</a></li>
<li><a href="scrollbar.">Barre de défilement</a></li>
<li><a href="spinner.">Spinner</a></li>
<li><a href="notification.">Notification</a></li>
<li><a href="lightbox.">Lightbox</a></li>
<li><a href="stickynote.">Note collante</a></li>
<li><a href="timeline.">Chronologie</a></li>
<li><a href="form-wizard.">Assistant de formulaire</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="bar-chart-2"></i> <span> Graphiques</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="chart-apex.">Graphiques Apex</a></li>
<li><a href="chart-js.">Chart Js</a></li>
<li><a href="chart-morris.">Graphiques Morris</a></li>
<li><a href="chart-flot.">Graphiques Flot</a></li>
<li><a href="chart-peity.">Graphiques Peity</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="award"></i><span> Icônes</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="icon-fontawesome.">Icônes Fontawesome</a></li>
<li><a href="icon-feather.">Icônes Feather</a></li>
<li><a href="icon-ionic.">Icônes Ionic</a></li>
<li><a href="icon-material.">Icônes Material</a></li>
<li><a href="icon-pe7.">Icônes Pe7</a></li>
<li><a href="icon-simpleline.">Icônes Simpleline</a></li>
<li><a href="icon-themify.">Icônes Themify</a></li>
<li><a href="icon-weather.">Icônes Météo</a></li>
<li><a href="icon-typicon.">Icônes Typicon</a></li>
<li><a href="icon-flag.">Icônes Drapeau</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="columns"></i> <span> Formulaires</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="form-basic-inputs.">Entrées de base</a></li>
<li><a href="form-input-groups.">Groupes d'entrées</a></li>
<li><a href="form-horizontal.">Formulaire horizontal</a></li>
<li><a href="form-vertical.">Formulaire vertical</a></li>
<li><a href="form-mask.">Masque de formulaire</a></li>
<li><a href="form-validation.">Validation de formulaire</a></li>
<li><a href="form-select2.">Formulaire Select2</a></li>
<li><a href="form-fileupload.">Téléchargement de fichier</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><i data-feather="layout"></i> <span> Tableau</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="tables-basic.">Tableaux de base</a></li>
<li><a href="data-tables.">Table de données</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/product.svg') }}" alt="img"><span> Application</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="chat.">Chat</a></li>
<li><a href="calendar.">Calendrier</a></li>
<li><a href="email.">Email</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/time.svg') }}" alt="img"><span> Rapport</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="purchaseorderreport.">Rapport de bon de commande</a></li>
<li><a href="inventoryreport.">Rapport d'inventaire</a></li>
<li><a href="salesreport.">Rapport des ventes</a></li>
<li><a href="invoicereport.">Rapport de facture</a></li>
<li><a href="purchasereport.">Rapport d'achat</a></li>
<li><a href="supplierreport.">Rapport fournisseur</a></li>
<li><a href="customerreport.">Rapport client</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img"><span> Utilisateurs</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="newuser.">Nouvel utilisateur</a></li>
<li><a href="userlists.">Liste des utilisateurs</a></li>
</ul>
</li>
<li class="submenu">
<a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/settings.svg') }}" alt="img"><span> Paramètres</span> <span class="menu-arrow"></span></a>
<ul>
<li><a href="generalsettings.">Paramètres généraux</a></li>
<li><a href="emailsettings.">Paramètres d'email</a></li>
 <li><a href="paymentsettings.">Paramètres de paiement</a></li>
<li><a href="currencysettings.">Paramètres de devise</a></li>
<li><a href="grouppermissions.">Permissions de groupe</a></li>
<li><a href="taxrates.">Taux d'imposition</a></li>
</ul>
</li>
</ul>
</div>
</div>
</div>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget">
<div class="dash-widgetimg">
<span><img src="{{ asset('assets/img/icons/dash1.svg') }}" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>$<span class="counters" data-count="307144.00">$307,144.00</span></h5>
<h6>Total des achats dus</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash1">
<div class="dash-widgetimg">
<span><img src="{{ asset('assets/img/icons/dash2.svg') }}" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>$<span class="counters" data-count="4385.00">$4,385.00</span></h5>
<h6>Total des ventes dues</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash2">
<div class="dash-widgetimg">
<span><img src="{{ asset('assets/img/icons/dash3.svg') }}" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>$<span class="counters" data-count="385656.50">385,656.50</span></h5>
<h6>Montant total des ventes</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash3">
<div class="dash-widgetimg">
<span><img src="{{ asset('assets/img/icons/dash4.svg') }}" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>$<span class="counters" data-count="40000.00">400.00</span></h5>
<h6>Montant total des ventes</h6>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count">
<div class="dash-counts">
<h4>100</h4>
<h5>Clients</h5>
</div>
<div class="dash-imgs">
<i data-feather="user"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4>100</h4>
<h5>Fournisseurs</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4>100</h4>
<h5>Facture d'achat</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<h4>105</h4>
<h5>Facture de vente</h5>
</div>
<div class="dash-imgs">
<i data-feather="file"></i>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-7 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h5 class="card-title mb-0">Achats & Ventes</h5>
<div class="graph-sets">
<ul>
<li>
<span>Ventes</span>
</li>
<li>
<span>Achats</span>
</li>
</ul>
<div class="dropdown">
<button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
 2022 <img src="{{ asset('assets/img/icons/dropdown.svg') }}" alt="img" class="ms-2">
</button>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="javascript:void(0);" class="dropdown-item">2022</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item">2021</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item">2020</a>
</li>
</ul>
</div>
</div>
</div>

<div class="card-body">
<div id="sales_charts"></div>
</div>
</div>
</div>
<div class="col-lg-5 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h4 class="card-title mb-0">Recently Added Products</h4>
<div class="dropdown">
<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
<i class="fa fa-ellipsis-v"></i>
</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="productlist" class="dropdown-item">Product List</a>
</li>
<li>
<a href="addproduct" class="dropdown-item">Product Add</a>
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="table-responsive dataview">
<table class="table datatable ">
<thead>
<tr>
<th>Sno</th>
<th>Products</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td class="productimgname">
<a href="productlist" class="product-img">
<img src="assets/img/product/product22.jpg" alt="product">
</a>
<a href="productlist">Apple Earpods</a>
</td>
<td>$891.2</td>
</tr>
<tr>
<td>2</td>
<td class="productimgname">
<a href="productlist" class="product-img">
<img src="assets/img/product/product23.jpg" alt="product">
</a>
<a href="productlist">iPhone 11</a>
</td>
<td>$668.51</td>
</tr>
<tr>
<td>3</td>
<td class="productimgname">
<a href="productlist" class="product-img">
<img src="assets/img/product/product24.jpg" alt="product">
</a>
<a href="productlist">samsung</a>
</td>
<td>$522.29</td>
</tr>
<tr>
<td>4</td>
<td class="productimgname">
<a href="productlist" class="product-img">
<img src="assets/img/product/product6.jpg" alt="product">
</a>
<a href="productlist">Macbook Pro</a>
</td>
<td>$291.01</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="card mb-0">
<div class="card-body">
<h4 class="card-title">Expired Products</h4>
<div class="table-responsive dataview">
<table class="table datatable ">
<thead>
<tr>
<th>SNo</th>
<th>Product Code</th>
<th>Product Name</th>
<th>Brand Name</th>
<th>Category Name</th>
<th>Expiry Date</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td><a href="javascript:void(0);">IT0001</a></td>
<td class="productimgname">
<a class="product-img" href="productlist">
<img src="assets/img/product/product2.jpg" alt="product">
</a>
<a href="productlist">Orange</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>12-12-2022</td>
</tr>
<tr>
<td>2</td>
<td><a href="javascript:void(0);">IT0002</a></td>
<td class="productimgname">
<a class="product-img" href="productlist">
<img src="assets/img/product/product3.jpg" alt="product">
</a>
<a href="productlist">Pineapple</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>25-11-2022</td>
</tr>
<tr>
<td>3</td>
<td><a href="javascript:void(0);">IT0003</a></td>
<td class="productimgname">
<a class="product-img" href="productlist">
<img src="assets/img/product/product4.jpg" alt="product">
</a>
<a href="productlist">Stawberry</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>19-11-2022</td>
</tr>
<tr>
<td>4</td>
<td><a href="javascript:void(0);">IT0004</a></td>
<td class="productimgname">
<a class="product-img" href="productlist">
<img src="assets/img/product/product5.jpg" alt="product">
</a>
<a href="productlist">Avocat</a>
</td>
<td>N/D</td>
<td>Fruits</td>
<td>20-11-2022</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/feather.min.js"></script>

<script src="assets/js/jquery.slimscroll.min.js"></script>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="assets/plugins/apexchart/chart-data.js"></script>

<script src="assets/js/script.js"></script>
</body>
</html>