<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_twig_error_test' => [['code', '_format'], ['_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'admin_mail_inscription' => [[], ['_controller' => 'App\\Controller\\EmailController::mailInscription'], [], [['text', '/admin/etudiant_mail_inscription']], [], []],
    'notification' => [[], ['_controller' => 'App\\Controller\\NotificationController::notification'], [], [['text', '/notification']], [], []],
    'remove_notification' => [['id'], ['_controller' => 'App\\Controller\\NotificationController::removeNotif'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/notification/remove']], [], []],
    'taches' => [[], ['_controller' => 'App\\Controller\\TachesController::index'], [], [['text', '/taches']], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\accueilController::home'], [], [['text', '/']], [], []],
    'admin_home' => [[], ['_controller' => 'App\\Controller\\adminController::home'], [], [['text', '/admin/home']], [], []],
    'admin_promotion' => [[], ['_controller' => 'App\\Controller\\adminController::promotion'], [], [['text', '/admin/promotion']], [], []],
    'promotionAction' => [[], ['_controller' => 'App\\Controller\\adminController::promotionAction'], [], [['text', '/admin/promotionAction']], [], []],
    'admin_dashboard' => [[], ['_controller' => 'App\\Controller\\adminController::index'], [], [['text', '/admin/dashboard']], [], []],
    'admin_liste_etudiant' => [[], ['_controller' => 'App\\Controller\\adminController::listeEtudiant'], [], [['text', '/admin/choix']], [], []],
    'admin_liste_tuteur' => [[], ['_controller' => 'App\\Controller\\adminController::listeTuteur'], [], [['text', '/admin/liste_tuteur']], [], []],
    'admin_liste_groupe' => [[], ['_controller' => 'App\\Controller\\adminController::listeGroupe'], [], [['text', '/admin/liste_groupe']], [], []],
    'admin_edit_etudiant' => [['id'], ['_controller' => 'App\\Controller\\adminController::edit_etudiant'], [], [['variable', '', '[^/]++', 'id', true], ['text', '/admin/etudiant']], [], []],
    'admin_edit_tuteur' => [['id'], ['_controller' => 'App\\Controller\\adminController::edit_tuteur'], [], [['variable', '', '[^/]++', 'id', true], ['text', '/admin/tuteur']], [], []],
    'admin_edit_groupe' => [['id'], ['_controller' => 'App\\Controller\\adminController::edit_groupe'], [], [['variable', '', '[^/]++', 'id', true], ['text', '/admin/groupe']], [], []],
    'admin_delete_etudiant' => [['id'], ['_controller' => 'App\\Controller\\adminController::delete_etudiant'], [], [['variable', '', '[^/]++', 'id', true], ['text', '/admin/etudiant']], [], []],
    'admin_delete_tuteur' => [['id'], ['_controller' => 'App\\Controller\\adminController::delete_tuteur'], [], [['variable', '', '[^/]++', 'id', true], ['text', '/admin/tuteur']], [], []],
    'admin_delete_groupe' => [['id'], ['_controller' => 'App\\Controller\\adminController::delete_groupe'], [], [['variable', '', '[^/]++', 'id', true], ['text', '/admin/groupe']], [], []],
    'admin_create_r_etudiant' => [[], ['_controller' => 'App\\Controller\\adminController::creation_etudiant'], [], [['text', '/admin/etudiant_create/r']], [], []],
    'etudiant_home' => [[], ['_controller' => 'App\\Controller\\etudiantController::home'], [], [['text', '/etudiant/home']], [], []],
    'myproject' => [[], ['_controller' => 'App\\Controller\\etudiantController::myproject'], [], [['text', '/myproject']], [], []],
    'groupe_creation' => [[], ['_controller' => 'App\\Controller\\groupeController::creation'], [], [['text', '/creation_groupe']], [], []],
    'groupe_liste' => [[], ['_controller' => 'App\\Controller\\groupeController::listeGroupe'], [], [['text', '/liste_groupe']], [], []],
    'groupe_rejoindre' => [['nom'], ['_controller' => 'App\\Controller\\groupeController::rejoindreGroupe'], [], [['variable', '/', '[^/]++', 'nom', true], ['text', '/rejoindre_groupe']], [], []],
    'accepter_etudiant' => [['id', 'id_notif'], ['_controller' => 'App\\Controller\\groupeController::accepterEtudaint'], [], [['variable', '/', '[^/]++', 'id_notif', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/accepter_groupe']], [], []],
    'refuser_etudiant' => [['id', 'id_notif'], ['_controller' => 'App\\Controller\\groupeController::refuserEtudaint'], [], [['variable', '/', '[^/]++', 'id_notif', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/refuser_groupe']], [], []],
    'quitter_groupe' => [[], ['_controller' => 'App\\Controller\\groupeController::quitterGroupe'], [], [['text', '/quitter_groupe']], [], []],
    'accepter_groupe' => [['id', 'id_notif'], ['_controller' => 'App\\Controller\\groupeController::accepterGroupe'], [], [['variable', '/', '[^/]++', 'id_notif', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/accepter_groupe_groupe']], [], []],
    'refuser_groupe' => [['id', 'id_notif'], ['_controller' => 'App\\Controller\\groupeController::refuserGroupe'], [], [['variable', '/', '[^/]++', 'id_notif', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/refuser_groupe']], [], []],
    'accepter_tuteur' => [['id', 'id_notif'], ['_controller' => 'App\\Controller\\groupeController::accepterTuteur'], [], [['variable', '/', '[^/]++', 'id_notif', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/accepter_tuteur']], [], []],
    'refuser_tuteur' => [['id', 'id_notif'], ['_controller' => 'App\\Controller\\groupeController::refuserTuteur'], [], [['variable', '/', '[^/]++', 'id_notif', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/refuser_tuteur']], [], []],
    'monprojet' => [[], ['_controller' => 'App\\Controller\\reunionController::myproject'], [], [['text', '/monprojet']], [], []],
    'reunion_historique' => [[], ['_controller' => 'App\\Controller\\reunionController::reunion'], [], [['text', '/reunion_historique']], [], []],
    'Ajout_reunion' => [[], ['_controller' => 'App\\Controller\\reunionController::ajoutReunion'], [], [['text', '/reunion_ajoutReunion']], [], []],
    'reunion_show' => [['id'], ['_controller' => 'App\\Controller\\reunionController::show'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/reunion']], [], []],
    'taches_change_statut' => [['id', 'statut'], ['_controller' => 'App\\Controller\\reunionController::tache_statut'], [], [['variable', '/', '[^/]++', 'statut', true], ['variable', '/', '[^/]++', 'id', true], ['text', '/taches_change_statut']], [], []],
    'tuteur_home' => [[], ['_controller' => 'App\\Controller\\tuteurController::home'], [], [['text', '/tuteur/home']], [], []],
    'mesgroupes' => [[], ['_controller' => 'App\\Controller\\tuteurController::mesgroupes'], [], [['text', '/tuteur/mesgroupes']], [], []],
    'fos_user_security_login' => [[], ['_controller' => 'fos_user.security.controller:loginAction'], [], [['text', '/login']], [], []],
    'fos_user_security_check' => [[], ['_controller' => 'fos_user.security.controller:checkAction'], [], [['text', '/login_check']], [], []],
    'fos_user_security_logout' => [[], ['_controller' => 'fos_user.security.controller:logoutAction'], [], [['text', '/logout']], [], []],
    'fos_user_profile_show' => [[], ['_controller' => 'fos_user.profile.controller:showAction'], [], [['text', '/profile/']], [], []],
    'fos_user_profile_edit' => [[], ['_controller' => 'fos_user.profile.controller:editAction'], [], [['text', '/profile/edit']], [], []],
    'fos_user_registration_register' => [[], ['_controller' => 'fos_user.registration.controller:registerAction'], [], [['text', '/register/']], [], []],
    'fos_user_registration_check_email' => [[], ['_controller' => 'fos_user.registration.controller:checkEmailAction'], [], [['text', '/register/check-email']], [], []],
    'fos_user_registration_confirm' => [['token'], ['_controller' => 'fos_user.registration.controller:confirmAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/register/confirm']], [], []],
    'fos_user_registration_confirmed' => [[], ['_controller' => 'fos_user.registration.controller:confirmedAction'], [], [['text', '/register/confirmed']], [], []],
    'fos_user_resetting_request' => [[], ['_controller' => 'fos_user.resetting.controller:requestAction'], [], [['text', '/resetting/request']], [], []],
    'fos_user_resetting_send_email' => [[], ['_controller' => 'fos_user.resetting.controller:sendEmailAction'], [], [['text', '/resetting/send-email']], [], []],
    'fos_user_resetting_check_email' => [[], ['_controller' => 'fos_user.resetting.controller:checkEmailAction'], [], [['text', '/resetting/check-email']], [], []],
    'fos_user_resetting_reset' => [['token'], ['_controller' => 'fos_user.resetting.controller:resetAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/resetting/reset']], [], []],
    'fos_user_change_password' => [[], ['_controller' => 'fos_user.change_password.controller:changePasswordAction'], [], [['text', '/profile/change-password']], [], []],
];
