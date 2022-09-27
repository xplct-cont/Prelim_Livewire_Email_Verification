<div>
    <table class="table table-hover text-center table-sm mt-4 shadow-lg p-3 mb-5 bg-white rounded">
        <thead class="bg-info text-dark" style="font-size:15px;">
            <tr>
                <th>Operator Name</th>
                <th>Bus Name</th>
                <th>Point of Origin</th>
                <th>Destination</th>
                <th>Passenger Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="" style="font-size: 13.5px;">
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->operator_name }}</td>
                    <td>{{ $booking->bus_name }}</td>
                    <td>{{ $booking->point_of_origin }}</td>
                    <td>{{ $booking->destination }}</td>
                    <td>{{ $booking->passenger_name }}</td>
                    <td>
                        <a href="{{ url('edit', ['booking' => $booking->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url('delete', ['booking' => $booking->id]) }}" class="btn btn-sm btn-danger">Delete</i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

