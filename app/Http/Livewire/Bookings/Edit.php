<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;
use App\Events\UserEvent;


class Edit extends Component
{
    public $bookingId;
    public $operator_name, $bus_name, $point_of_origin, $destination, $passenger_name, $email, $log_entry;

    public function mount() {
        $this->operator_name             = $this->booking->operator_name;
        $this->bus_name                  = $this->booking->bus_name;
        $this->point_of_origin           = $this->booking->point_of_origin;
        $this->destination               = $this->booking->destination;
        $this->passenger_name            = $this->booking->passenger_name;
        $this->email                     = $this->booking->email;

    }

    public function editBooking() {
        $this->validate([
            'operator_name'              => ['required','string','max:255'],
            // 'email'             => ['required','email','unique:students'],
            'bus_name'                   => ['required','string','max:255'],
            'point_of_origin'            => ['required','string','max:255'],
            'destination'                => ['required','string','max:255'],
            'passenger_name'             => ['required','string','max:255'],
           
        ]);

        $this->booking->update([
            'operator_name'              => $this->operator_name,
            'bus_name'                   => $this->bus_name,
            'point_of_origin'            => $this->point_of_origin,
            'destination'                => $this->destination,
            'passenger_name'             => $this->passenger_name,
            'email'                      => $this->email,
            
        ]);

        $log_entry = 'Update Booking: "' .$this->booking->passenger_name . '"with an ID:' .$this->booking->id;
        event(new UserEvent($log_entry));

        return redirect('/dashboard')->with('message', $this->booking->passenger_name .' updated successfully');
    }

    public function back() {
        return redirect('/dashboard');
    }

    public function getBookingProperty() {
        return Booking::find($this->bookingId);
    }

    public function render()
    {
        return view('livewire.bookings.edit');
    }
}
