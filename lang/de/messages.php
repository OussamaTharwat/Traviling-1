<?php

use App\Helpers\BaseTranslationHelper;
use Modules\AboutUs\Helpers\AboutTranslationHelper;
use Modules\Auth\Helpers\AuthTranslationHelper;
use Modules\Category\Helpers\CategoryTranslationHelper;
use Modules\Footer\Helpers\FooterTranslationHelper;
use Modules\FQ\Helpers\FQTranslationHelper;
use Modules\Tour\Helpers\ToureTranslationHelper;
use Modules\UploadFile\Helpers\UploadFileTranslationHelper;

return [
    'created' => 'Erfolgreich erstellt',
    'updated' => 'Erfolgreich aktualisiert',
    'deleted' => 'Erfolgreich gelöscht',
    'created_female' => 'Erfolgreich erstellt',
    'updated_female' => 'Erfolgreich aktualisiert',
    'deleted_female' => 'Erfolgreich gelöscht',
    'accepted' => 'Wurde akzeptiert',
    'rejected' => 'Wurde abgelehnt',
    'reset' => 'Erfolgreich zurückgesetzt',
    'logged' => 'Erfolgreich eingeloggt',
    'logged_out' => 'Erfolgreich ausgeloggt',
    'wrong_credentials' => 'Falsche Zugangsdaten',
    'verified' => 'Erfolgreich verifiziert',
    'profile' => 'Profil',
    'handle' => 'Benutzername',
    'password_reset_sent' => 'Passwort-Zurücksetzungslink gesendet',
    'pass_code' => 'Passcode',
    'pass_code_created_before' => 'Passcode wurde bereits erstellt',
    'wrong_pass_code' => 'Falscher Passcode',
    'mark_all_as_read' => 'Alle Nachrichten wurden als gelesen markiert',
    'chat' => 'Chat',
    'price_plan' => 'Tarifplan',
    'credit_card' => 'Kreditkarte',
    'customer' => 'Kunde',
    'invalid_stripe_token' => 'Ungültiges Kreditkarten-Token',
    'stripe_token_used_before' => 'Stripe-Token wurde bereits verwendet',
    'frozen' => 'Ist eingefroren',
    'active' => 'Ist jetzt aktiv',
    'banned' => 'Ist eingefroren',
    'cannot_move_to_same_plan' => 'Kann nicht auf denselben Tarif upgraden',
    'cannot_upgrade_to_free_trial' => 'Upgrade auf kostenlose Testversion nicht möglich',
    'customer_credit_card_not_found' => 'Kreditkarte des Kunden existiert nicht',
    'plan_changed_successfully' => 'Tarif erfolgreich geändert',
    'group' => 'Gruppe',
    'post' => 'Beitrag',
    'member' => 'Mitglied',
    'contract' => 'Vertrag',
    'department' => 'Abteilung',
    'department_manger' => 'Abteilungsleiter',
    'appointment' => 'Termin',
    'setting' => 'Einstellung',
    'forbidden' => 'Zugriff verweigert',
    'notifications' => 'Benachrichtigungen',
    'read' => 'Erfolgreich gelesen',
    'failed_to_read_file' => 'Rechnung konnte nicht gelesen werden',
    'invoice' => 'Rechnung',
    'paid' => 'Erfolgreich bezahlt',
    'sent' => 'Erfolgreich gesendet',
    'terms' => 'Allgemeine Geschäftsbedingungen',
    'access_denied' => 'Zugriff verweigert',
    'cannot_proceed' => 'Vorgang kann nicht fortgesetzt werden',
    'status' => 'Status',
    'finished' => 'Erfolgreich abgeschlossen',
    'record_not_found' => 'Die angeforderte Ressource konnte nicht gefunden werden',
    'maintenance_mode' => 'Wir führen derzeit Wartungsarbeiten durch, bitte versuchen Sie es später erneut',
    ...BaseTranslationHelper::en(),
    ...AboutTranslationHelper::de(),
    ...FQTranslationHelper::de(),
    ...UploadFileTranslationHelper::de(),
    ...CategoryTranslationHelper::de(),
    ...FooterTranslationHelper::de(),
    ...AuthTranslationHelper::de(),
    ...ToureTranslationHelper::de(),
];
