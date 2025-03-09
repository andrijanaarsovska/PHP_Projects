<div>
    <h1>Transactions</h1>
    <a href="{{ route('transactions.create') }}">Add Transaction</a>

    @if($transactions->isEmpty())
        <p>No reservations found.</p>
    @else
        <table border="1">
            <thead>

            <tr>
                <th>Employee Name Surname</th>
                <th>Sender Name Surname</th>
                <th>Receiver Name Surname</th>
                <th>Sender Transaction</th>
                <th>Receiver Transaction</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->employeeNameSurname }}</td>
                    <td>{{ $transaction->senderNameSurname }}</td>
                    <td>{{ $transaction->receiverNameSurname }}</td>
                    <td>{{ $transaction->senderTransaction }}</td>
                    <td>{{ $transaction->receiverTransaction }}</td>
                    <td>{{ $transaction->price }}</td>
                    <td>{{ $transaction->date }}</td>
                    <td>
                        <a href="{{ route('transactions.edit', $transaction->id) }}">Update</a>
                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this transaction?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
