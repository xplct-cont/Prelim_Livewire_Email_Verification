<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;
use App\Events\UserEvent;

class Create extends Component
{
    public $operator_name, $bus_name, $point_of_origin, $destination, $passenger_name, $email;

    public function addBooking(){
     
            $this->validate([
                'operator_name'       => ['required','string','max:255'],
                'bus_name'            => ['required','string','max:255'],
                'point_of_origin'     => ['required','string','max:255'],
                'destination'         => ['required','string','max:255'],
                'passenger_name'      => ['required','string','max:255'],
                'email'               => ['required','email','unique:bookings'],
            
            ]);
    
            Booking::create([
                'operator_name'        => $this->operator_name,
                'bus_name'             => $this->bus_name,
                'point_of_origin'      => $this->point_of_origin,
                'destination'          => $this->destination,
                'passenger_name'       => $this->passenger_name,
                'email'                => $this->email,
                
            ]);
            
        $log_entry = 'Added Booking: "' .$this->passenger_name;
        event(new UserEvent($log_entry));

            return redirect('/dashboard')->with('message', $this->passenger_name . ' added successfully');
    }

    public function updated($propertyEmail)
    {
        $this->validateOnly($propertyEmail, [
            'email'  => ['required','email','unique:bookings'],
            
        ]);
    }

    public function render()
    {
        return view('livewire.bookings.create');
    }
}
