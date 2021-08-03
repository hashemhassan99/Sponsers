<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Governorate;
use App\Models\Nationality;
use App\Models\Neighborhood;
use App\Models\PersonalSponser;
use App\Models\ResidenceCountry;
use Livewire\Component;
use Livewire\WithPagination;

use GuzzleHttp\Client;

class PersonalSponsers extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $verification_card_type;
    public $verification_card;
    public $sponser_name;
    public $governorate_id = null;
    public $city_id = null;
    public $neighborhood_id;
    public $address;
    public $mobile;
    public $phone;
    public $email;
    public $nationality_id;
    public $residence_country_id;
    public $governorates;
    public $cities;
    public $neighborhoods;
    public $nationalities;
    public $residences;
    public $modal_id;
    public $confirmSponserDelete = false;
    public $showSendMessage = false;
    public $selectedCityId = null;
    public $selectedNationalityId = null;
    public $selectedResidenceId = null;
    public $search;
    public $message;


    public function mount()
    {

        $this->governorates = Governorate::all();
        $this->nationalities = Nationality::all();
        $this->residences = ResidenceCountry::all();
        $this->cities = City::all();
        $this->neighborhoods = Neighborhood::all();
    }

    public function updatedGovernorateId($governorate_id)
    {
        $this->cities = City::where('governorate_id', $governorate_id)->get();
    }

    public function updatedCityId($city_id)
    {
        $this->neighborhoods = Neighborhood::where('city_id', $city_id)->get();
    }


    public function showCreateModal()
    {
        $this->modelFormReset();
        $this->modalFormVisible = true;
    }

    public function showUpdateModal($id)
    {
        $this->modelFormReset();
        $this->modalFormVisible = true;
        $this->modal_id = $id;
        $this->loadModelData();
    }

    public function showMessageModal($id)
    {
        $this->showSendMessage = true;
        $this->modal_id = $id;
    }

    public function showDeleteModal($id)
    {
        $this->confirmSponserDelete = true;
        $this->modal_id = $id;
    }

    public function modelData()
    {
        return [
            'verification_card_type' => $this->verification_card_type,
            'verification_card' => $this->verification_card,
            'sponser_name' => $this->sponser_name,
            'address' => $this->address,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'email' => $this->mobile,
            'governorate_id' => $this->governorate_id,
            'city_id' => $this->city_id,
            'neighborhood_id' => $this->neighborhood_id,
            'residence_country_id' => $this->residence_country_id,
            'nationality_id' => $this->nationality_id,
        ];
    }

    public function loadModelData()
    {
        $data = PersonalSponser::find($this->modal_id);
        $this->verification_card_type = $data->verification_card_type;
        $this->sponser_name = $data->sponser_name;
        $this->address = $data->address;
        $this->mobile = $data->mobile;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->governorate_id = $data->governorate_id;
        $this->city_id = $data->city_id;
        $this->neighborhood_id = $data->neighborhood_id;
        $this->residence_country_id = $data->residence_country_id;
        $this->nationality_id = $data->nationality_id;


    }

    public function rules()
    {
        return [
            'verification_card_type' => ['required'],
            'verification_card' => ['required'],
            'sponser_name' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'mobile' => ['required'],
            'email' => ['required'],
            'residence_country_id' => ['required'],
            'governorate_id' => ['required'],
            'city_id' => ['required'],
            'neighborhood_id' => ['required'],
            'nationality_id' => ['required'],

        ];
    }

    public function modelFormReset()
    {
        $this->verification_card_type = null;
        $this->verification_card = null;
        $this->sponser_name = null;
        $this->address = null;
        $this->mobile = null;
        $this->phone = null;
        $this->mobile = null;
        $this->governorate_id = null;
        $this->city_id = null;
        $this->neighborhood_id = null;
        $this->residence_country_id = null;
        $this->nationality_id = null;

    }

    public function store()
    {

        $this->validate();
        PersonalSponser::create($this->modelData());
        $this->modelFormReset();
        $this->modalFormVisible = false;
        $this->alert('success', 'Sponser Added Success!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => null,
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);


    }

    public function update()
    {
        $this->validate();
        $sponser = PersonalSponser::where('id', $this->modal_id)->first();
        $sponser->update($this->modelData());
        $this->modalFormVisible = false;
        $this->modelFormReset();
        $this->alert('success', 'Sponser updated Success!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => null,
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);
    }

    public function destroy()
    {
        $sponser = PersonalSponser::where('id', $this->modal_id)->first();
        $sponser->delete();
        $this->confirmSponserDelete = false;
        $this->alert('success', 'Sponser deleted Success!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => null,
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);
    }

    public function all_sponsers()
    {
        return PersonalSponser::orderByDesc('id')->paginate(5);
    }


    public function send_message()
    {

        $phone = PersonalSponser::select('mobile')->where('id',$this->modal_id)->first();
        $message = urlencode($this->message);
        $password = urlencode("nepras-serv2020");
        $username = urlencode("nepras-serv");


     $res = file_get_contents('https://www.nsms.ps/api.php?comm=sendsms&user='.$username.'&pass='.$password.'&to=' .$phone->mobile. '&message=' . $message . '&sender=nepras.com');

        $this->showSendMessage = false;
        $this->alert('success', 'Message Sent Success!', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => null,
            'confirmButtonText' => 'Ok',
            'cancelButtonText' => 'Cancel',
            'showCancelButton' => true,
            'showConfirmButton' => false,
        ]);






    }
    public function render()
    {

        $sponsers = PersonalSponser::with(['city','governorate','nationality','residenceCountry']);

        if (isset($this->selectedCityId) && $this->selectedCityId != "")
            $sponsers =  $sponsers->where('city_id',$this->selectedCityId);

        if (isset($this->selectedNationalityId)&& $this->selectedNationalityId != "")
            $sponsers =  $sponsers->where('nationality_id',$this->selectedNationalityId);

        if (isset($this->selectedResidenceId)&& $this->selectedResidenceId != "")
            $sponsers =  $sponsers->where('residence_country_id',$this->selectedResidenceId);

        if (isset($this->search))
            $sponsers = $sponsers
                ->where('sponser_name', 'like', '%' . $this->search . '%');

        $sponsers = $sponsers->orderByDesc('id')->paginate(10);

        return view('livewire.personal-sponsers', compact('sponsers'));
















//        if (is_null($this->search)) {
//            $sponsers = PersonalSponser::orderByDesc('id')->paginate(5);//
//        } else {
//            $sponsers = PersonalSponser::where('sponser_name', 'Like', '%' . $this->search . '%')->paginate(5);
//        }
//
//        if ($this->selectedCityId) {
//            $sponsers = PersonalSponser::where('city_id', $this->selectedCityId)->paginate(5);
//        } elseif ($this->selectedNationalityId) {
//            $sponsers = PersonalSponser::where('nationality_id', $this->selectedNationalityId)->paginate(5);
//        } elseif($this->selectedResidenceId){
//             $sponsers = PersonalSponser::where('residence_country_id', $this->selectedResidenceId)->paginate(5);
//
//
//    }
//        return view('livewire.personal-sponsers', compact('sponsers'));


    }


}
