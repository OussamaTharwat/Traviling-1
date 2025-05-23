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
    'created' => 'créé avec succès',
    'updated' => 'mis à jour avec succès',
    'deleted' => 'supprimé avec succès',
    'created_female' => 'créée avec succès',
    'updated_female' => 'mise à jour avec succès',
    'deleted_female' => 'supprimée avec succès',
    'accepted' => 'a été accepté',
    'rejected' => 'a été rejeté',
    'reset' => 'réinitialisé avec succès',
    'logged' => 'connecté avec succès',
    'logged_out' => 'déconnecté avec succès',
    'wrong_credentials' => 'Identifiants incorrects',
    'verified' => 'Vérifié avec succès',
    'profile' => 'Profil',
    'handle' => 'Identifiant',
    'password_reset_sent' => 'Lien de réinitialisation du mot de passe envoyé',
    'pass_code' => 'Code d’accès',
    'pass_code_created_before' => 'Code d’accès déjà créé',
    'wrong_pass_code' => 'Code d’accès incorrect',
    'mark_all_as_read' => 'Tous les messages ont été marqués comme lus avec succès',
    'chat' => 'Discussion',
    'price_plan' => 'Forfait',
    'credit_card' => 'Carte de crédit',
    'customer' => 'Client',
    'invalid_stripe_token' => 'Jeton de carte de crédit invalide',
    'stripe_token_used_before' => 'Jeton Stripe déjà utilisé',
    'frozen' => 'Est gelé',
    'active' => 'Est maintenant actif',
    'banned' => 'Est gelé',
    'cannot_move_to_same_plan' => 'Impossible de passer au même forfait',
    'cannot_upgrade_to_free_trial' => 'Impossible de passer à l’essai gratuit',
    'customer_credit_card_not_found' => 'Carte de crédit du client introuvable',
    'plan_changed_successfully' => 'Forfait changé avec succès',
    'group' => 'Groupe',
    'post' => 'Publication',
    'member' => 'Membre',
    'contract' => 'Contrat',
    'department' => 'Département',
    'department_manger' => 'Responsable de département',
    'appointment' => 'Rendez-vous',
    'setting' => 'Paramètre',
    'forbidden' => 'Accès refusé',
    'notifications' => 'Notifications',
    'read' => 'Lu avec succès',
    'failed_to_read_file' => 'Échec de la lecture de la facture',
    'invoice' => 'Facture',
    'paid' => 'Payé avec succès',
    'sent' => 'Envoyé avec succès',
    'terms' => 'Conditions générales',
    'access_denied' => 'Accès refusé',
    'cannot_proceed' => 'Impossible de continuer',
    'status' => 'Statut',
    'finished' => 'Terminé avec succès',
    'record_not_found' => 'Impossible de trouver la ressource demandée',
    'maintenance_mode' => 'Nous sommes actuellement en maintenance, veuillez réessayer plus tard',
    ...BaseTranslationHelper::en(),
    ...AboutTranslationHelper::fr(),
    ...FQTranslationHelper::fr(),
    ...UploadFileTranslationHelper::fr(),
    ...CategoryTranslationHelper::fr(),
    ...FooterTranslationHelper::fr(),
    ...AuthTranslationHelper::fr(),
    ...ToureTranslationHelper::fr(),
];
