<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use DragonCode\Contracts\Http\Builder;
use Illuminate\Support\Facades\Route;
use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Rule;

trait VillageroftheyearSubmissionTrait
{
    public function __construct()
    {
        $this->route_name = 'villageroftheyearsubmission';
        $this->route_list = route('villageroftheyearsubmission.list');
        $this->config = module_config('VillageroftheyearSubmission');
        $this->fields = $this->config['fields'];
        $this->tab_title = isset($this->config['tab_title']) ? $this->config['tab_title'] : null;
        $this->moduleClass = 'Manta\Models\VillageroftheyearSubmission';
    }

    public ?VillageroftheyearSubmission $item = null;
    public ?VillageroftheyearSubmission $itemOrg = null;




    #[Locked]
    public ?string $company_id = null;

    #[Locked]
    public ?string $host = null;

    public ?string $locale = null;
    public ?string $pid = null;


    public ?string $company = null;
    public ?string $title = null;
    public ?string $sex = null;
    public ?string $firstname = null;
    public ?string $lastname = null;
    public ?string $email = null;
    public ?string $phone = null;
    public ?string $address = null;
    public ?string $address_nr = null;
    public ?string $zipcode = null;
    public ?string $city = null;
    public ?string $country = null;
    public ?string $birthdate = null;
    public ?bool $newsletters = false;
    public ?string $subject = null;
    public ?string $comment = null;
    public ?string $internal_contact = null;
    public ?string $ip = null;

    protected function applySearch($query)
    {
        return $this->search === ''
            ? $query
            : $query->where(function (Builder $querysub) {
                $querysub->where('title', 'LIKE', "%{$this->search}%")
                    ->orWhere('comment', 'LIKE', "%{$this->search}%");
            });
    }


    public function rules()
    {
        $return = [];

        // Controleer en voeg validatie toe als het veld actief en eventueel verplicht is
        if ($this->fields['company']['active'] == true) {
            $return['company'] = $this->fields['company']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['title']['active'] == true) {
            $return['title'] = $this->fields['title']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['sex']['active'] == true) {
            $return['sex'] = $this->fields['sex']['required'] == true ? 'required|in:male,female' : 'nullable|in:male,female';
        }

        if ($this->fields['firstname']['active'] == true) {
            $return['firstname'] = $this->fields['firstname']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['lastname']['active'] == true) {
            $return['lastname'] = $this->fields['lastname']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['email']['active'] == true) {
            $return['email'] = $this->fields['email']['required'] == true ? 'required|email|max:255' : 'nullable|email|max:255';
        }

        if ($this->fields['phone']['active'] == true) {
            $return['phone'] = $this->fields['phone']['required'] == true ? 'required|string|max:20' : 'nullable|string|max:20';
        }

        if ($this->fields['address']['active'] == true) {
            $return['address'] = $this->fields['address']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['address_nr']['active'] == true) {
            $return['address_nr'] = $this->fields['address_nr']['required'] == true ? 'required|numeric' : 'nullable|numeric';
        }

        if ($this->fields['zipcode']['active'] == true) {
            $return['zipcode'] = $this->fields['zipcode']['required'] == true ? 'required|string|max:10' : 'nullable|string|max:10';
        }

        if ($this->fields['city']['active'] == true) {
            $return['city'] = $this->fields['city']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['country']['active'] == true) {
            $return['country'] = $this->fields['country']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['birthdate']['active'] == true) {
            $return['birthdate'] = $this->fields['birthdate']['required'] == true ? 'required|date|before:today' : 'nullable|date|before:today';
        }

        if ($this->fields['newsletters']['active'] == true) {
            $return['newsletters'] = $this->fields['newsletters']['required'] == true ? 'required|boolean' : 'nullable|boolean';
        }

        if ($this->fields['subject']['active'] == true) {
            $return['subject'] = $this->fields['subject']['required'] == true ? 'required|string|max:255' : 'nullable|string|max:255';
        }

        if ($this->fields['comment']['active'] == true) {
            $return['comment'] = $this->fields['comment']['required'] == true ? 'required|string|max:5000' : 'nullable|string|max:5000';
        }

        if ($this->fields['internal_contact']['active'] == true) {
            $return['internal_contact'] = $this->fields['internal_contact']['required'] == true ? 'required|boolean' : 'nullable|boolean';
        }

        if ($this->fields['ip']['active'] == true) {
            $return['ip'] = $this->fields['ip']['required'] == true ? 'required|ip' : 'nullable|ip';
        }

        return $return;
    }


    public function messages()
    {
        $return = [];

        // Foutmeldingen voor required en andere validatieregels per veld
        $return['company.required'] = 'De bedrijfsnaam is verplicht';
        $return['title.required'] = 'De functietitel is verplicht';
        $return['sex.required'] = 'Het geslacht is verplicht';
        $return['sex.in'] = 'Het geslacht moet male of female zijn';
        $return['firstname.required'] = 'De voornaam is verplicht';
        $return['lastname.required'] = 'De achternaam is verplicht';
        $return['email.required'] = 'Het e-mailadres is verplicht';
        $return['email.email'] = 'Voer een geldig e-mailadres in';
        $return['phone.required'] = 'Het telefoonnummer is verplicht';
        $return['address.required'] = 'Het adres is verplicht';
        $return['address_nr.required'] = 'Het huisnummer is verplicht';
        $return['address_nr.numeric'] = 'Het huisnummer moet een nummer zijn';
        $return['zipcode.required'] = 'De postcode is verplicht';
        $return['city.required'] = 'De stad is verplicht';
        $return['country.required'] = 'Het land is verplicht';
        $return['birthdate.required'] = 'De geboortedatum is verplicht';
        $return['birthdate.date'] = 'Voer een geldige geboortedatum in';
        $return['birthdate.before'] = 'De geboortedatum moet in het verleden liggen';
        $return['newsletters.required'] = 'Geef aan of de persoon nieuwsbrieven wil ontvangen';
        $return['newsletters.boolean'] = 'Het veld nieuwsbrieven moet waar of onwaar zijn';
        $return['subject.required'] = 'Het onderwerp is verplicht';
        $return['comment.required'] = 'Het commentaar is verplicht';
        $return['internal_contact.required'] = 'Geef aan of er een interne contactpersoon is';
        $return['internal_contact.boolean'] = 'Het veld interne contactpersoon moet waar of onwaar zijn';
        $return['ip.required'] = 'Het IP-adres is verplicht';
        $return['ip.ip'] = 'Voer een geldig IP-adres in';

        return $return;
    }
}
