<div>
    <div class="card shadow border border-light">
        <div class="card-header text-dark">
            <h5 class="text-center mt-2">Are you sure to delete it?</h5>
        </div>
        <div class="card-body">
            {{-- <div class="col-md-4 offset-md-4">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="img-fluid mb-3 rounded-circle mt-3 img-responsive center-block d-block mx-auto" style="width: 90px;">
            </div> --}}
            <table class="table table-striped">
                <tr>
                    <th>
                        Operator Name:
                    </th>
                    <td>
                        {{ $this->booking->operator_name }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Bus Name:
                    </th>
                    <td>
                        {{ $this->booking->bus_name }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Point of Origin:
                    </th>
                    <td>
                        {{ $this->booking->point_of_origin }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Destination:
                    </th>
                    <td>
                        {{ $this->booking->destination }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Passenger Name:
                    </th>
                    <td>
                        {{ $this->booking->passenger_name }}
                    </td>
                </tr>

            </table>
            <div class="d-flex justify-content-end">
                <button class="btn btn-danger" wire:click="delete()">
                    Delete
                </button>
                <button class="btn btn-info mx-2" wire:click="back()">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>
