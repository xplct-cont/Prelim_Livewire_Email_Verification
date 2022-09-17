
<div>
    <div class="container">
    <div class="card">
     <div class="card-header">
         <h3>Edit Booking</h3>
     </div>
     <div class="card-body">
         <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.defer='operator_name'>
             <label for="operator_name">Operator Name</label>
             @error('operator_name')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
 
         {{-- <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.debounce.500ms='bus_name'>
             <label for="bus_name">Bus Name</label>
             @error('bus_name')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div> --}}
 
         <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.defer='point_of_origin'>
             <label for="point_of_origin">Point of Origin</label>
             @error('point_of_origin')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
 
         <div class="form-floating mb-3">
             <input type="text" class="form-control" wire:model.defer='destination'>
             <label for="destination">Destination</label>
             @error('destination')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>

         <div class="form-floating mb-3">
            <input type="text" class="form-control" wire:model.defer='passenger_name'>
            <label for="passenger_name">Passenger Name</label>
            @error('passenger_name')
            <div class="text-danger">{{$message}}</div>
            @enderror
        </div>
 
         <div class="form-floating mb-3">
            <select name="bus_name" class="form-select" wire:model.defer='bus_name'>
             <option hidden="true">Select Bus</option>
             <option selected disabled>Select Bus</option>
             <option value="Charter Bus Corp.">Charter Bus Corp.</option>
             <option value="Dragon Lines Bus">Dragon Lines Bus</option>
             <option value="Ceres Bus Lines">Ceres Bus Lines</option>
            </select>
            <label for="bus_name">Bus Name</label>
            @error('bus_name')
             <div class="text-danger">{{$message}}</div>
             @enderror
         </div>
          <div class="form-group mb-2 d-grip gap-2 d-md-flex justify-content-end">
            <button class="btn btn-success" wire:click="editBooking()">
                Save Changes
            </button>
            <button class="btn btn-info mx-2" wire:click="back()">
                back
            </button>
        </div>
     </div>
    </div>
 </div>
 
</div>
