<?php

namespace Darvis\ModuleVillageroftheyear\Livewire\VillageroftheyearSubmission;

use Carbon\Carbon;
use Livewire\Component;
use Darvis\ModuleVillageroftheyear\Models\VillageroftheyearSubmission;
use Illuminate\Http\Request;
use Darvis\Manta\Traits\MantaTrait;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class VillageroftheyearSubmissionCreate extends Component
{
    use MantaTrait;
    use VillageroftheyearSubmissionTrait;

    public function mount(Request $request)
    {
        $this->locale = getLocaleManta();
        if ($request->input('locale') && $request->input('pid')) {
            $villageroftheyearSubmission = VillageroftheyearSubmission::find($request->input('pid'));
            $this->pid = $villageroftheyearSubmission->id;
            $this->locale = $request->input('locale');
            $this->itemOrg = $villageroftheyearSubmission;
        }


        if (class_exists(Faker::class) && config('app.env') === 'local') {
            $locale = 'nl_NL';  // Zet de locale in een variabele voor herbruikbaarheid
            $faker = Faker::create($locale);
            $this->company = $faker->company;
            $this->title = $faker->jobTitle;
            $this->sex = $faker->randomElement(['male', 'female']);
            $this->firstname = $faker->firstName;
            $this->lastname = $faker->lastName;
            $this->email = $faker->unique()->safeEmail;
            $this->phone = $faker->phoneNumber;
            $this->address = $faker->streetName;
            $this->address_nr = $faker->buildingNumber;
            $this->zipcode = $faker->postcode;
            $this->city = $faker->city;
            $this->country = $faker->country;
            $this->birthdate = Carbon::parse($faker->date('Y-m-d', '2000-01-01'))->format('Y-m-d'); // Vóór 2000
            $this->newsletters = $faker->boolean;
            $this->subject = $faker->sentence(5);
            $this->comment = $faker->paragraph;
            $this->internal_contact = $faker->boolean;
            $this->ip = $faker->ipv4;
        }

        $this->getLocaleInfo();
        $this->getTablist();
        $this->getBreadcrumb('create');
    }
    public function render()
    {
        return view('manta::default.manta-default-create')->title('Dorper van het jaar inzending toevoegen');
    }



    public function save()
    {
        $this->validate();

        $row = $this->only(
            'locale',
            'company',
            'title',
            'sex',
            'firstname',
            'lastname',
            'email',
            'phone',
            'address',
            'zipcode',
            'city',
            'country',
            'birthdate',
            'newsletters',
            'subject',
            'comment',
        );
        $row['created_by'] = auth('staff')->user()->name;
        VillageroftheyearSubmission::create($row);


        return $this->redirect(VillageroftheyearSubmissionList::class);
    }
}
