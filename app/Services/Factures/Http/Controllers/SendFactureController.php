<?php
namespace App\Services\Factures\Http\Controllers;

use App\PDFFile;
use App\EmailPartenaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;
use App\Services\Factures\Models\Facture;

class SendFactureController extends Controller{
    
    protected $from_email = "facturation@armonya.fr";
    protected $from_title = "Facture";

    public function send(Request $request, Facture $facture) {

        // Config::set('mail.username', 'facturation@armonya.fr');
        // Config::set('mail.password', 'facturation0204');

        $facture = $facture->find($request->facture_id);
        $PDFFile = PDFFile::find($facture->pdf_id);

        $facture_emails = $request->facture_emails;
        $facture_emails_cc = $request->facture_emails_cc;

        Mail::send('factures::emails.facture', ['facture' => $facture], function ($m) use ($facture, $PDFFile, $facture_emails, $facture_emails_cc) {
            $subject = "Nouvelle Facture ";
            
            $m->from($this->from_email, $this->from_title);
            $m->bcc('infos@armonya.fr');
            $m->attach($PDFFile->path);

            // Partenaire mail
            foreach($facture_emails as $email_id) {
                $email = EmailPartenaire::find($email_id);
                $m->to($email->email, $email->partenaire->name)->subject($subject);
            }
            // mail_cc
            if($facture_emails_cc != '') {
                foreach($facture_emails_cc as $email_id_cc) {
                    $email = EmailPartenaire::find($email_id_cc);
                    $m->cc($email->email);
                }
            }
        });

        // TODO: remettre l'email votrerendez-vous
        // Config::set('mail.username', 'votrerendezvous@armonya.fr');
        // Config::set('mail.password', 'marsois0105');

        $facture->status = "Envoyée";
        $facture->save();
        return redirect()->back();
        
    }

}