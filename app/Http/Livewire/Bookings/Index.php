<?php

namespace App\Http\Livewire\Bookings;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    
    public $search, $bus_name='all';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function loadBookings() {
        $query = Booking::orderBy('passenger_name')
        ->search($this->search);

        if($this->bus_name!='all'){
            $query->where('bus_name', $this->bus_name);
        }
       
        
       
        $bookings = $query->paginate(2);
        return compact('bookings');
    }

    public function render()
    {
        return view('livewire.bookings.index', $this->loadBookings());
    }
}
