<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\GovernmentSponser;
use Livewire\Component;
use Livewire\WithPagination;

class GovernmentSponsers extends Component
{
    use WithPagination;

    public $modalFormVisible = false;
    public $sponser_name;
    public $city_id;
    public $address;
    public $mobile;
    public $phone;
    public $email;
    public $cities;
    public $contact_person;
    public $modal_id;
    public $confirmSponserDelete = false;
    public $selectedCityId;
    public $search;


    public function mount()
    {
        $this->cities = City::all();

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

    public function showDeleteModal($id)
    {
        $this->confirmSponserDelete = true;
        $this->modal_id = $id;
    }

    public function modelData()
    {
        return [

            'sponser_name' => $this->sponser_name,
            'address' => $this->address,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'email' => $this->mobile,
            'contact_person' => $this->contact_person,
            'city_id' => $this->city_id,

        ];
    }

    public function loadModelData()
    {
        $data = GovernmentSponser::find($this->modal_id);
        $this->sponser_name =  $data->sponser_name;
        $this->address =  $data->address;
        $this->mobile =  $data->mobile;
        $this->phone =  $data->phone;
        $this->email =  $data->email;
        $this->contact_person =  $data->contact_person;
        $this->city_id =  $data->city_id;



    }

    public function rules()
    {
        return [

            'sponser_name' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'mobile' => ['required'],
            'contact_person' => ['required'],
            'email' => ['required'],
            'city_id' => ['required'],


        ];
    }

    public function modelFormReset()
    {

        $this->sponser_name = null;
        $this->address = null;
        $this->mobile = null;
        $this->contact_person = null;
        $this->email = null;
        $this->phone = null;
        $this->city_id = null;


    }

    public function store()
    {

        $this->validate();
        GovernmentSponser::create($this->modelData());
        $this->modelFormReset();
        $this->modalFormVisible = false;
        $this->alert('success', 'Sponser Added Success!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  null,
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);



    }

    public function update()
    {
        $this->validate();
        $sponser = GovernmentSponser::where('id',$this->modal_id)->first();
        $sponser->update($this->modelData());
        $this->modalFormVisible = false;
        $this->modelFormReset();
        $this->alert('success', 'Sponser updated Success!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  null,
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }

    public function destroy()
    {
        $sponser = GovernmentSponser::where('id',$this->modal_id)->first();
        $sponser->delete();
        $this->confirmSponserDelete  = false;
        $this->alert('success', 'Sponser deleted Success!', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  null,
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }
    public function all_sponsers()
    {
        return GovernmentSponser::orderByDesc('id')->paginate(5);

    }
    public function render()
    {
        $sponsers = GovernmentSponser::with(['city']);

        if (isset($this->selectedCityId) && $this->selectedCityId != "")
            $sponsers =  $sponsers->where('city_id',$this->selectedCityId);

        if (isset($this->search))
            $sponsers = $sponsers->where('sponser_name', 'like', '%' . $this->search . '%');

        $sponsers = $sponsers->orderByDesc('id')->paginate(10);

        return view('livewire.government-sponsers',compact('sponsers'));
    }
}
