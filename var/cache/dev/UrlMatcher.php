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
        '/' => [[['_route' => 'home', '_controller' => 'App\\Controller\\accueilController::home'], null, null, null, false, false, null]],
        '/admin/home' => [[['_route' => 'admin_home', '_controller' => 'App\\Controller\\adminController::home'], null, null, null, false, false, null]],
        '/admin/dashboard' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\adminController::index'], null, null, null, false, false, null]],
        '/admin/choix' => [[['_route' => 'admin_liste_etudiant', '_controller' => 'App\\Controller\\adminController::listeEtudiant'], null, null, null, false, false, null]],
        '/admin/liste_tuteur' => [[['_route' => 'admin_liste_tuteur', '_controller' => 'App\\Controller\\adminController::listeTuteur'], null, null, null, false, false, null]],
        '/admin/liste_groupe' => [[['_route' => 'admin_liste_groupe', '_controller' => 'App\\Controller\\adminController::listeGroupe'], null, null, null, false, false, null]],
        '/etudiant/home' => [[['_route' => 'etudiant_home', '_controller' => 'App\\Controller\\etudiantController::home'], null, null, null, false, false, null]],
        '/myproject' => [[['_route' => 'myproject', '_controller' => 'App\\Controller\\etudiantController::myproject'], null, null, null, false, false, null]],
        '/groupe/home' => [[['_route' => 'groupe_home', '_controller' => 'App\\Controller\\groupeController::home'], null, null, null, false, false, null]],
        '/monprojet' => [[['_route' => 'monprojet', '_controller' => 'App\\Controller\\reunionController::myproject'], null, null, null, false, false, null]],
        '/reunion_historique' => [[['_route' => 'reunion_historique', '_controller' => 'App\\Controller\\reunionController::reunion'], null, null, null, false, false, null]],
        '/reunion_ajoutReunion' => [[['_route' => 'Ajout_reunion', '_controller' => 'App\\Controller\\reunionController::ajoutReunion'], null, null, null, false, false, null]],
        '/tuteur/home' => [[['_route' => 'tuteur_home', '_controller' => 'App\\Controller\\tuteurController::home'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'fos_user_security_login', '_controller' => 'fos_user.security.controller:loginAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/login_check' => [[['_route' => 'fos_user_security_check', '_controller' => 'fos_user.security.controller:checkAction'], null, ['POST' => 0], null, false, false, null]],
        '/logout' => [[['_route' => 'fos_user_security_logout', '_controller' => 'fos_user.security.controller:logoutAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/profile' => [[['_route' => 'fos_user_profile_show', '_controller' => 'fos_user.profile.controller:showAction'], null, ['GET' => 0], null, true, false, null]],
        '/profile/edit' => [[['_route' => 'fos_user_profile_edit', '_controller' => 'fos_user.profile.controller:editAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/register' => [[['_route' => 'fos_user_registration_register', '_controller' => 'fos_user.registration.controller:registerAction'], null, ['GET' => 0, 'POST' => 1], null, true, false, null]],
        '/register/check-email' => [[['_route' => 'fos_user_registration_check_email', '_controller' => 'fos_user.registration.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/register/confirmed' => [[['_route' => 'fos_user_registration_confirmed', '_controller' => 'fos_user.registration.controller:confirmedAction'], null, ['GET' => 0], null, false, false, null]],
        '/resetting/request' => [[['_route' => 'fos_user_resetting_request', '_controller' => 'fos_user.resetting.controller:requestAction'], null, ['GET' => 0], null, false, false, null]],
        '/resetting/send-email' => [[['_route' => 'fos_user_resetting_send_email', '_controller' => 'fos_user.resetting.controller:sendEmailAction'], null, ['POST' => 0], null, false, false, null]],
        '/resetting/check-email' => [[['_route' => 'fos_user_resetting_check_email', '_controller' => 'fos_user.resetting.controller:checkEmailAction'], null, ['GET' => 0], null, false, false, null]],
        '/profile/change-password' => [[['_route' => 'fos_user_change_password', '_controller' => 'fos_user.change_password.controller:changePasswordAction'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
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
                .'|/re(?'
                    .'|union/(?'
                        .'|([^/]++)(*:283)'
                        .'|taches(*:297)'
                    .')'
                    .'|gister/confirm/([^/]++)(*:329)'
                    .'|setting/reset/([^/]++)(*:359)'
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
            [['_route' => 'admin_edit_etudiant', '_controller' => 'App\\Controller\\adminController::edit_etudiant'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null],
            [['_route' => 'admin_delete_etudiant', '_controller' => 'App\\Controller\\adminController::delete_etudiant'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        224 => [
            [['_route' => 'admin_edit_tuteur', '_controller' => 'App\\Controller\\adminController::edit_tuteur'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null],
            [['_route' => 'admin_delete_tuteur', '_controller' => 'App\\Controller\\adminController::delete_tuteur'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        250 => [
            [['_route' => 'admin_edit_groupe', '_controller' => 'App\\Controller\\adminController::edit_groupe'], ['id'], ['POST' => 0, 'GET' => 1], null, false, true, null],
            [['_route' => 'admin_delete_groupe', '_controller' => 'App\\Controller\\adminController::delete_groupe'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        283 => [[['_route' => 'reunion_show', '_controller' => 'App\\Controller\\reunionController::show'], ['id'], null, null, false, true, null]],
        297 => [[['_route' => 'taches', '_controller' => 'App\\Controller\\reunionController::tache'], [], null, null, false, false, null]],
        329 => [[['_route' => 'fos_user_registration_confirm', '_controller' => 'fos_user.registration.controller:confirmAction'], ['token'], ['GET' => 0], null, false, true, null]],
        359 => [
            [['_route' => 'fos_user_resetting_reset', '_controller' => 'fos_user.resetting.controller:resetAction'], ['token'], ['GET' => 0, 'POST' => 1], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
