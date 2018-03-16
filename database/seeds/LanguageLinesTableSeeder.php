<?php

use Illuminate\Database\Seeder;

class LanguageLinesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('language_lines')->delete();

        \DB::table('language_lines')->insert(array (
            0 =>
            array (
                'id' => '1',
                'group' => 'common',
                'key' => 'ok',
                'text' => '{"en":"Ok","fr":"Ok"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            1 =>
            array (
                'id' => '2',
                'group' => 'common',
                'key' => 'close',
                'text' => '{"en":"Close","fr":"Fermer"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            2 =>
            array (
                'id' => '3',
                'group' => 'common',
                'key' => 'cancel',
                'text' => '{"en":"Cancel","fr":"Annuler"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            3 =>
            array (
                'id' => '4',
                'group' => 'common',
                'key' => 'error_alert_title',
                'text' => '{"en":"Oops...","fr":"Oops..."}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            4 =>
            array (
                'id' => '5',
                'group' => 'common',
                'key' => 'error_alert_text',
                'text' => '{"en":"Something went wrong! Please try again.","fr":"Un probl\\u00e8me est survenu ! Ressayer."}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            5 =>
            array (
                'id' => '6',
                'group' => 'common',
                'key' => 'token_expired_alert_title',
                'text' => '{"en":"Session Expired!","fr":"La session \\u00e0 expir\\u00e9!"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            6 =>
            array (
                'id' => '7',
                'group' => 'common',
                'key' => 'token_expired_alert_text',
                'text' => '{"en":"Please log in again to continue.","fr":"Veuillez vous authentifier pour continuer."}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            7 =>
            array (
                'id' => '8',
                'group' => 'common',
                'key' => 'login',
                'text' => '{"en":"Log In","fr":"S\'authentifier"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            8 =>
            array (
                'id' => '9',
                'group' => 'common',
                'key' => 'register',
                'text' => '{"en":"Register","fr":"S\'enregistrer"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            9 =>
            array (
                'id' => '10',
                'group' => 'common',
                'key' => 'page_not_found',
                'text' => '{"en":"Page Not Found","fr":"Page non trouv\\u00e9e"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            10 =>
            array (
                'id' => '11',
                'group' => 'common',
                'key' => 'go_home',
                'text' => '{"en":"Go Home","fr":"Retour \\u00e0 l\'index"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            11 =>
            array (
                'id' => '12',
                'group' => 'common',
                'key' => 'logout',
                'text' => '{"en":"Logout","fr":"Logout"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            12 =>
            array (
                'id' => '13',
                'group' => 'common',
                'key' => 'email',
                'text' => '{"en":"Email","fr":"Email"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            13 =>
            array (
                'id' => '14',
                'group' => 'common',
                'key' => 'remember_me',
                'text' => '{"en":"Remember Me","fr":"Rester connect\\u00e9"}',
                'created_at' => '2018-03-05 20:43:30',
                'updated_at' => '2018-03-05 20:43:30',
            ),
            14 =>
            array (
                'id' => '15',
                'group' => 'common',
                'key' => 'password',
                'text' => '{"en":"Password","fr":"Mot de pass"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            15 =>
            array (
                'id' => '16',
                'group' => 'common',
                'key' => 'forgot_password',
                'text' => '{"en":"Forgot Your Password?","fr":"Mot de passe oubli\\u00e9 ?"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            16 =>
            array (
                'id' => '17',
                'group' => 'common',
                'key' => 'confirm_password',
                'text' => '{"en":"Confirm Password","fr":"Confirmation du mot de pass"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            17 =>
            array (
                'id' => '18',
                'group' => 'common',
                'key' => 'name',
                'text' => '{"en":"Name","fr":"Nom"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            18 =>
            array (
                'id' => '19',
                'group' => 'common',
                'key' => 'toggle_navigation',
                'text' => '{"en":"Toggle navigation","fr":"Basculer navigation"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            19 =>
            array (
                'id' => '20',
                'group' => 'common',
                'key' => 'home',
                'text' => '{"en":"Home","fr":"Index"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            20 =>
            array (
                'id' => '21',
                'group' => 'common',
                'key' => 'you_are_logged_in',
                'text' => '{"en":"You are logged in!","fr":"Vous \\u00eates authentifi\\u00e9 !"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            21 =>
            array (
                'id' => '22',
                'group' => 'common',
                'key' => 'reset_password',
                'text' => '{"en":"Reset Password","fr":"r\\u00e9initialiser Password"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            22 =>
            array (
                'id' => '23',
                'group' => 'common',
                'key' => 'send_password_reset_link',
                'text' => '{"en":"Send Password Reset Link","fr":"Envoi d\'un lien de r\\u00e9initialisation"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            23 =>
            array (
                'id' => '24',
                'group' => 'common',
                'key' => 'settings',
                'text' => '{"en":"Settings","fr":"Configurations"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            24 =>
            array (
                'id' => '25',
                'group' => 'common',
                'key' => 'profile',
                'text' => '{"en":"Profile","fr":"Profile"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            25 =>
            array (
                'id' => '26',
                'group' => 'common',
                'key' => 'your_info',
                'text' => '{"en":"Your Info","fr":"Vos infos"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            26 =>
            array (
                'id' => '27',
                'group' => 'common',
                'key' => 'info_updated',
                'text' => '{"en":"Your info has been updated!","fr":"Vos infos on \\u00e9t\\u00e9 mise \\u00e0 jour !"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            27 =>
            array (
                'id' => '28',
                'group' => 'common',
                'key' => 'update',
                'text' => '{"en":"Update","fr":"Modifier"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            28 =>
            array (
                'id' => '29',
                'group' => 'common',
                'key' => 'your_password',
                'text' => '{"en":"Your Password","fr":"Votre mot de passe"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            29 =>
            array (
                'id' => '30',
                'group' => 'common',
                'key' => 'password_updated',
                'text' => '{"en":"Your password has been updated!","fr":"Votre mot de passe \\u00e0 \\u00e9t\\u00e9 mis \\u00e0 jour !"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            30 =>
            array (
                'id' => '31',
                'group' => 'common',
                'key' => 'new_password',
                'text' => '{"en":"New Password","fr":"Nouveau mot de passe"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            31 =>
            array (
                'id' => '32',
                'group' => 'common',
                'key' => 'password_length_hint',
                'text' => '{"en":"At least 8 characters","fr":"Un minimum de 8 charact\\u00e8res est requis"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
            32 =>
            array (
                'id' => '33',
                'group' => 'common',
                'key' => 'nav_menu_title',
                'text' => '{"en":"Application Menu","fr":"Navigation"}',
                'created_at' => '2018-03-05 20:43:31',
                'updated_at' => '2018-03-05 20:43:31',
            ),
        ));


    }
}
