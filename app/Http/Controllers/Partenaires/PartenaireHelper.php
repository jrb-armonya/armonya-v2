<?php

namespace App\Http\Controllers\Partenaires;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\FicheConfirmed;
use App\Fiche;
use App\Partenaire;
use App\EmailPartenaire;
use App\PartenaireEmail;

class PartenaireHelper extends Controller
{

    /**
     * sendEmailConfirmation
     * Envoi un email de confirmation au Partenaire
     *
     * @param Fiche $fiche
     * @param String $path
     * @param array $partenaire_emails
     * @param array $partenaire_emails_cc
     * @return void
     */
    public function sendEmailConfirmation($fiche, $path, $partenaire_emails, $partenaire_emails_cc = null)
    {

        Mail::send('layouts.emails.rdv-confirmed', ['fiche' => $fiche], function ($m) use ($fiche, $path, $partenaire_emails, $partenaire_emails_cc) {

            $subject = "CONFIRMATION de votre RDV pour le " . $fiche->d_rv->format('d/m/Y') . " " . $fiche->h_rv . ". avec " . ucwords($fiche->name) . " " . ucwords($fiche->prenom);

            $m->from(env('MAIL_USERNAME'), 'Votre Rendez-vous');
            $m->attach($path);
            // Partenaire mail
            foreach ($partenaire_emails as $email_id) {
                $email = EmailPartenaire::find($email_id);
                $m->to($email->email, $email->partenaire->name)->subject($subject);
            }
            // mail_cc
            if ($partenaire_emails_cc != '') {
                foreach ($partenaire_emails_cc as $email_id_cc) {
                    $email = EmailPartenaire::find($email_id_cc);
                    $m->cc($email->email);
                }
            }
        });
    }

    /**
     * sendEmailAnnulation
     *  Envoi d'un email d'annumlion de rendez-vous à l'ancien Partenaire
     * @param Fiche $fiche
     * @param array $data
     * @return void
     */
    public function sendEmailAnnulation($fiche, $data)
    {
        $partenaire = Partenaire::find($fiche->partenaire_id);

        Mail::send('layouts.emails.rdv-annulation', ['fiche' => $fiche], function ($m) use ($fiche, $partenaire) {

            $subject = "AANULATION de votre RDV pour le " . $fiche->d_rv->format('d/m/Y') . ".  " . ucwords($fiche->name) . " " . ucwords($fiche->prenom);

            $m->from('MAIL_USERNAME', 'Votre Rendez-vous');
            foreach ($partenaire->emails as $email) {
                $m->to($email->email, $partenaire->name)->subject($subject);
            }
            // $m->bcc('infos@armonya.fr');
        });
    }

    public function sendEmaiLConfirmationEspacePartenaire($partenaire_id, $email_id, $password)
    {
        $partenaire = Partenaire::find($partenaire_id);
        $email = PartenaireEmail::find($email_id);

        Mail::send(
            'espace-partenaire::layouts.email-confirmation-espace',
            ['partenaire' => $partenaire, 'password' => $password],
            function ($m) use ($partenaire, $email) {
                $subject = "Votre Espace Partenaire est prêt";
                // $m->from('MAIL_USERNAME', 'jrb.youssef@gmail.com');
                $m->to($email->email, $partenaire->name)->subject($subject);
            }
        );
    }
}
