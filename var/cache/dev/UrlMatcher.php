<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\AccueilController::home'], null, null, null, false, false, null]],
        '/admin/home' => [[['_route' => 'admin_home', '_controller' => 'App\\Controller\\AdminController::home'], null, null, null, false, false, null]],
        '/admin/promotion' => [[['_route' => 'admin_promotion', '_controller' => 'App\\Controller\\AdminController::promotion'], null, null, null, false, false, null]],
        '/admin/promotionAction' => [[['_route' => 'promotionAction', '_controller' => 'App\\Controller\\AdminController::promotionAction'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\AdminController::index'], null, null, null, false, false, null]],
        '/admin/choix' => [[['_route' => 'admin_liste_etudiant', '_controller' => 'App\\Controller\\AdminController::listeEtudiant'], null, null, null, false, false, null]],
        '/admin/liste_tuteur' => [[['_route' => 'admin_liste_tuteur', '_controller' => 'App\\Controller\\AdminController::listeTuteur'], null, null, null, false, false, null]],
        '/admin/liste_groupe' => [[['_route' => 'admin_liste_groupe', '_controller' => 'App\\Controller\\AdminController::listeGroupe'], null, null, null, false, false, null]],
        '/default' => [[['_route' => 'default', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
        '/etudiant/home' => [[['_route' => 'etudiant_home', '_controller' => 'App\\Controller\\EtudiantController::home'], null, null, null, false, false, null]],
        '/myproject' => [[['_route' => 'myproject', '_controller' => 'App\\Controller\\EtudiantController::myproject'], null, null, null, false, false, null]],
        '/groupe/creation' => [[['_route' => 'groupe_creation', '_controller' => 'App\\Controller\\GroupeController::creation'], null, null, null, false, false, null]],
        '/groupe/liste' => [[['_route' => 'groupe_liste', '_controller' => 'App\\Controller\\GroupeController::listeGroupe'], null, null, null, false, false, null]],
        '/groupe/quitter' => [[['_route' => 'quitter_groupe', '_controller' => 'App\\Controller\\GroupeController::quitterGroupe'], null, null, null, false, false, null]],
        '/notification' => [[['_route' => 'notification', '_controller' => 'App\\Controller\\NotificationController::notification'], null, null, null, false, false, null]],
        '/inscription_etudiant' => [[['_route' => 'app_register_etudiant', '_controller' => 'App\\Controller\\RegistrationController::registerEtudiant'], null, null, null, false, false, null]],
        '/inscription_tuteur' => [[['_route' => 'app_register_tuteur', '_controller' => 'App\\Controller\\RegistrationController::registerTuteur'], null, null, null, false, false, null]],
        '/monprojet' => [[['_route' => 'monprojet', '_controller' => 'App\\Controller\\ReunionController::myproject'], null, null, null, false, false, null]],
        '/reunion_historique' => [[['_route' => 'reunion_historique', '_controller' => 'App\\Controller\\ReunionController::reunion'], null, null, null, false, false, null]],
        '/reunion_ajoutReunion' => [[['_route' => 'Ajout_reunion', '_controller' => 'App\\Controller\\ReunionController::ajoutReunion'], null, null, null, false, false, null]],
        '/security' => [[['_route' => 'security', '_controller' => 'App\\Controller\\SecurityController::index'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'security_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'security_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/forgotten_password' => [[['_route' => 'app_forgotten_password', '_controller' => 'App\\Controller\\SecurityController::forgottenPassword'], null, null, null, false, false, null]],
        '/tuteur/home' => [[['_route' => 'tuteur_home', '_controller' => 'App\\Controller\\TuteurController::home'], null, null, null, false, false, null]],
        '/tuteur/mesgroupes' => [[['_route' => 'mesgroupes', '_controller' => 'App\\Controller\\TuteurController::mesgroupes'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|etudiant([^/]++)(?'
                        .'|(*:198)'
                    .')'
                    .'|tuteur([^/]++)(?'
                        .'|(*:224)'
                    .')'
                    .'|groupe([^/]++)(?'
                        .'|(*:250)'
                    .')'
                .')'
                .'|/groupe/(?'
                    .'|re(?'
                        .'|joindre/([^/]++)(*:292)'
                        .'|fuser/([^/]++)/([^/]++)(*:323)'
                    .')'
                    .'|accepter/([^/]++)/([^/]++)(*:358)'
                .')'
                .'|/notification/remove/([^/]++)(*:396)'
                .'|/re(?'
                    .'|union/(?'
                        .'|([^/]++)(*:427)'
                        .'|taches(*:441)'
                    .')'
                    .'|set_password/([^/]++)(*:471)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        198 => [
            [['_route' => 'admin_edit_etudiant', '_controller' => 'App\\Controller\\AdminController::edit_etudiant'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null],
            [['_route' => 'admin_delete_etudiant', '_controller' => 'App\\Controller\\AdminController::delete_etudiant'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        224 => [
            [['_route' => 'admin_edit_tuteur', '_controller' => 'App\\Controller\\AdminController::edit_tuteur'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null],
            [['_route' => 'admin_delete_tuteur', '_controller' => 'App\\Controller\\AdminController::delete_tuteur'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        250 => [
            [['_route' => 'admin_edit_groupe', '_controller' => 'App\\Controller\\AdminController::edit_groupe'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null],
            [['_route' => 'admin_delete_groupe', '_controller' => 'App\\Controller\\AdminController::delete_groupe'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        292 => [[['_route' => 'groupe_rejoindre', '_controller' => 'App\\Controller\\GroupeController::rejoindreGroupe'], ['nom'], null, null, false, true, null]],
        323 => [[['_route' => 'refuser_etudiant', '_controller' => 'App\\Controller\\GroupeController::refuserEtudaint'], ['id', 'id_notif'], null, null, false, true, null]],
        358 => [[['_route' => 'accepter_etudiant', '_controller' => 'App\\Controller\\GroupeController::accepterEtudaint'], ['id', 'id_notif'], null, null, false, true, null]],
        396 => [[['_route' => 'remove_notification', '_controller' => 'App\\Controller\\NotificationController::removeNotif'], ['id'], null, null, false, true, null]],
        427 => [[['_route' => 'reunion_show', '_controller' => 'App\\Controller\\ReunionController::show'], ['id'], null, null, false, true, null]],
        441 => [[['_route' => 'taches', '_controller' => 'App\\Controller\\ReunionController::tache'], [], null, null, false, false, null]],
        471 => [
            [['_route' => 'app_reset_password', '_controller' => 'App\\Controller\\SecurityController::resetPassword'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
