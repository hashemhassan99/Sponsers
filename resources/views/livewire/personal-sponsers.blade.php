<div>

    <div class="row mb-3 p-2 inline-flex">
        <br>
        <div class="col-md-3">
            <label for="">City</label>
            <select wire:model="selectedCityId" class="form-control">
                <option value="">No Selected</option>
                @foreach($cities as $city)
                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="col-md-3">
            <label for="">Nationalities</label>
            <select wire:model="selectedNationalityId" class="form-control">
                <option value="">No Selected</option>
                @foreach($nationalities as $nationality)
                    <option value="{{$nationality->id}}">{{$nationality->nationality_name}}</option>
                @endforeach
            </select>
        </div>
        <br>


        <div class="col-md-3">
            <label for="">Residences</label>
            <select wire:model="selectedResidenceId" class="form-control">
                <option value="">No Selected</option>
                @foreach($residences as $residence)
                    <option value="{{$residence->id}}">{{$residence->residence_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="">Sponser Name</label>
            <input type="text" class="form-control" wire:model.debounce.350ms="search">
        </div>
    </div>


    <div class="flex items-center justify-end py-4 text-right">
        <x-jet-button wire:click="showCreateModal">
            Create Personal Sponser
        </x-jet-button>
    </div>
    <table class="w-full divide-y divide-gray-200">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">id</th>
            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">Name</th>
            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">City</th>
            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">Address</th>
            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">Mobile</th>
            <th class="px-6 py-3 border-b-2 border-gray-200 text-left text-blue-500 tracking-wider">Actions</th>
        </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
        @forelse($sponsers as $sponser)
            <tr>
                <td class="px-6 py-3 border-b border-gray-200">{{$sponser->id}}</td>
                <td class="px-6 py-3 border-b border-gray-200">{{$sponser->sponser_name}}</td>
                <td class="px-6 py-3 border-b border-gray-200">{{$sponser->city->city_name}}</td>
                <td class="px-6 py-3 border-b border-gray-200">{{$sponser->address}}</td>
                <td class="px-6 py-3 border-b border-gray-200">{{$sponser->mobile}}</td>
                <td class="px-6 py-3 border-b border-gray-200">
                    <div class="flex items-center justify-end py-4 text-right">
                        <x-jet-button class="mr-2" wire:click="showUpdateModal({{$sponser->id}})">
                            Edit
                        </x-jet-button>

                        <x-jet-button class="mr-2" wire:click="showMessageModal({{$sponser->id}})">
                            Message
                        </x-jet-button>

                        <x-jet-danger-button class="mr-2" wire:click="showDeleteModal({{$sponser->id}})">
                            Delete
                        </x-jet-danger-button>


                    </div>

                </td>
            </tr>
        @empty
            <td class="px-6 py-3 border-b border-gray-200" colspan="7">No Sponsers Found</td>
        @endforelse

        </tbody>

    </table>
    <div class="pt-4">
        {{$sponsers->links()}}

    </div>

    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{$modal_id ? 'update Personal Sponser': ' Create Personal Sponser '}}
        </x-slot>

        <x-slot name="content">

            <div class="mt-4">
                <x-jet-label for="verification_card" value="Verification Card"></x-jet-label>

                <input type="radio" name="verification_card_type" wire:model="verification_card_type"
                       value="identification" checked>
                <label>Identification</label>

                <input type="radio" name="verification_card_type" wire:model="verification_card_type" value="passport">
                <label>Passport</label>

                <x-jet-input class="ml-3" type="text" id="verification_card"
                             wire:model="verification_card"></x-jet-input>
                @error('verification_card')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>


            <div class="mt-4">
                <x-jet-label for="sponser_name" value="Name"></x-jet-label>
                <x-jet-input type="text" id="sponser_name" wire:model="sponser_name"
                             class="block mt-1 w-full"></x-jet-input>
                @error('sponser_name')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="governorate_id" value="Governorate"></x-jet-label>
                <select class="rounded block w-full" wire:model="governorate_id">
                    @foreach($governorates as $governorate)
                        <option value="{{$governorate->id}}">{{$governorate->governorate_name}}</option>
                    @endforeach
                </select>
                @error('governorate_id')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>



                <div class="mt-4">
                    <x-jet-label for="city_id" value="City"></x-jet-label>
                    <select class="rounded block w-full" wire:model="city_id">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->city_name}}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                    <span class="text-red-900 text-sm">{{$message}}</span>
                    @enderror
                </div>





                    <div class="mt-4">
                    <x-jet-label for="neighborhood_id" value="Neighborhood"></x-jet-label>
                    <select class="rounded block w-full" wire:model="neighborhood_id">
                        <option value="">----</option>
                        @foreach($neighborhoods as $neighborhood)
                            <option value="{{$neighborhood->id}}">{{$neighborhood->neighborhood_name}}</option>
                        @endforeach
                    </select>
                    @error('neighborhood_id')
                    <span class="text-red-900 text-sm">{{$message}}</span>
                    @enderror
                </div>


            <div class="mt-4">
                <x-jet-label for="address" value="Address"></x-jet-label>
                <x-jet-input type="text" id="address" wire:model="address" class="block mt-1 w-full"></x-jet-input>
                @error('address')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="mobile" value="Mobile"></x-jet-label>
                <x-jet-input type="text" id="mobile" wire:model="mobile" class="block mt-1 w-full"></x-jet-input>
                @error('mobile')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="Phone"></x-jet-label>
                <x-jet-input type="text" id="phone" wire:model="phone" class="block mt-1 w-full"></x-jet-input>
                @error('phone')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="Email"></x-jet-label>
                <x-jet-input type="email" id="email" wire:model="email" class="block mt-1 w-full"></x-jet-input>
                @error('email')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>


            <div class="mt-4">
                <x-jet-label for="nationality_id" value="Nationality"></x-jet-label>
                <select class="rounded block w-full" wire:model="nationality_id">
                    @foreach($nationalities as $nationality)
                        <option value="{{$nationality->id}}">{{$nationality->nationality_name}}</option>
                    @endforeach
                </select>
                @error('nationality_id')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="residence_country_id" value="Residence Country"></x-jet-label>
                <select class="rounded block w-full" wire:model="residence_country_id">
                    @foreach($residences as $residence)
                        <option value="{{$residence->id}}">{{$residence->residence_name}}</option>
                    @endforeach
                </select>
                @error('residence_country_id')
                <span class="text-red-900 text-sm">{{$message}}</span>
                @enderror
            </div>
        </x-slot>

        <x-slot name="footer">
            @if($modal_id)
                <x-jet-button wire:click="update">Update Sponser</x-jet-button>
            @else
                <x-jet-button wire:click="store">Create Sponser</x-jet-button>
            @endif

        </x-slot>

    </x-jet-dialog-modal>


    <x-jet-dialog-modal wire:model="confirmSponserDelete">
        <x-slot name="title">
            Delete Sponser
        </x-slot>

        <x-slot name="content">
            Are You Sure You Want to Delete this sponser

        </x-slot>

        <x-slot name="footer">
            <x-jet-danger-button wire:click="destroy">Delte Sponser</x-jet-danger-button>

        </x-slot>

    </x-jet-dialog-modal>


    <x-jet-dialog-modal wire:model="showSendMessage">
        <x-slot name="title">
            Send Message
        </x-slot>

        <x-slot name="content">
            <textarea name="message" id="message" cols="30" rows="5" class="rounded w-full" wire:model="message"></textarea>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="send_message">Send Message</x-jet-button>

        </x-slot>

    </x-jet-dialog-modal>



</div>
