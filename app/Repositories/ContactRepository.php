<?php namespace App\Repositories;
use App\Contact;

class ContactRepository {

    public function findByUsernameOrCreate($contactData)
    {
        $contact = Contact::where('email', '=', $contactData['email'])->first();

        if ($contact)
        {
            if ($contact->email == '') $contact = Contact::where('phone', '=', $contactData['phone'])->first();
        }

        if(isset($contact)) $this->checkIfUserNeedsUpdating($contactData, $contact);

        return Contact::firstOrCreate([

            'username' => $contactData['name'],
            'email' => $contactData['email'],
            'phone' => $contactData['phone'],
            'user_id' => \Auth::user()->id,

        ]);

    }

    private function checkIfUserNeedsUpdating($data, $contact)
    {
        $socialData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ];

        $dbData = [
            'name' => $contact->username,
            'email' => $contact->email,
            'phone' => $contact->phone,
        ];
        $differences = array_diff($socialData, $dbData);
        if (! empty($differences)) {
            $contact->username = $data['name'];
            $contact->email = $data['email'];
            $contact->phone = $data['phone'];
            $contact->save();
        }
    }

}