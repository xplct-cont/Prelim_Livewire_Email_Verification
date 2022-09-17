<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;

class Index extends Component
{
    public function loadBookings() {
        $bookings = Booking::orderBy('bus_name')->get();

        return compact('bookings');
    }

    public function render()
    {
        return view('livewire.bookings.index', $this->loadBookings());
    }
}
