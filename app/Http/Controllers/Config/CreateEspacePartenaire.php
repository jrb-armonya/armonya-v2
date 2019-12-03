<?php

namespace App\Http\Controllers\Config;

use App\User;
use App\PartenaireEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Partenaires\PartenaireHelper;


class CreateEspacePartenaire {

    // Create a new espace partenaire
    public function create($id)
    {
        $email = PartenaireEmail::find($id);

        $partenaire = $email->partenaire;

        $password = Str::random(8);
        

        $user = User::create([
            'name'      => explode("@", $email->email)[0],
            'email'     => $email->email,
            'fictif'     => null,
            'password'  => Hash::make($password),
            'role_id'   => 10
        ]);

        $email->update(['user_id' => $user->id]);

        // Send the email-confirmation to the email partenaire
        $helper = new PartenaireHelper();
        $helper->sendEmaiLConfirmationEspacePartenaire($partenaire->id, $email->id, $password);

        return redirect()->back();
    }
}