<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Delete extends Component
{
    public $bookingId;
    public function getBookingProperty() {
        return Booking::select('id','operator_name', 'bus_name', 'point_of_origin', 'destination', 'passenger_name')
            ->find($this->bookingId);
    }

    public function delete() {
        $this->booking->delete();

        return redirect('/dashboard')->with('message', $this->booking->passenger_name . ' deleted successfully');
    }

    public function back() {
        return redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.bookings.delete');
    }
}
