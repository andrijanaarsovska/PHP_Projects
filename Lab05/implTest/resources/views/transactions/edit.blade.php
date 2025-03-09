<h1>Edit Transaction</h1>

<!--protected $fillable = ['employeeNameSurname', 'senderNameSurname', 'receiverNameSurname',-->
<!--'senderTransaction', 'receiverTransaction','price', 'date'];-->

<form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="employeeNameSurname">employeeNameSurname:</label><br>
    <input type="text" id="employeeNameSurname" name="employeeNameSurname" value="{{ $transaction->employeeNameSurname }}" required><br><br>

    <label for="senderNameSurname">senderNameSurname:</label><br>
    <input type="text" id="senderNameSurname" name="senderNameSurname" value="{{ $transaction->senderNameSurname }}"
           required><br><br>

    <label for="receiverNameSurname">receiverNameSurname:</label><br>
    <input type="text" id="receiverNameSurname" name="receiverNameSurname" value="{{ $transaction->receiverNameSurname }}" required><br><br>

    <label for="senderTransaction">senderTransaction:</label><br>
    <input type="text" id="senderTransaction" name="senderTransaction" value="{{ $transaction->senderTransaction }}"
           required><br><br>
    <label for="receiverTransaction">receiverTransaction:</label><br>
    <input type="text" id="receiverTransaction" name="receiverTransaction" value="{{ $transaction->receiverTransaction }}"
           required><br><br>


    <label for="date">Check-In Date:</label><br>
    <input type="text" id="date" name="date" value="{{ $transaction->date }}"
           required><br><br>

    <label for="price">price:</label><br>
    <input type="text" id="price" name="price" value="{{ $transaction->price }}"
           required><br><br>

    <button type="submit">Update Transaction</button>
</form>
