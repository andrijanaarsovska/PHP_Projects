<h1>Create Transactions</h1>

<form action="<?php echo e(route('transactions.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <label for="employeeNameSurname">Employee Name Surname:</label><br>
    <input type="text" id="employeeNameSurname" name="employeeNameSurname" required><br><br>

    <label for="senderNameSurname">Sender Name Surname:</label><br>
    <input type="text" id="senderNameSurname" name="senderNameSurname"  required><br><br>

    <label for="receiverNameSurname">Receiver Name Surname:</label><br>
    <input type="text" id="receiverNameSurname" name="receiverNameSurname" required><br><br>

    <label for="senderTransaction">Sender Transaction:</label><br>
    <input type="text" id="senderTransaction" name="senderTransaction"  required><br><br>

    <label for="receiverTransaction">Receiver Transaction:</label><br>
    <input type="text" id="receiverTransaction" name="receiverTransaction"  required><br><br>


    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price"  required><br><br>

    <label for="date">Date:</label><br>
    <input type="text" id="date" name="date" required><br><br>



    <button type="submit">Create Transaction</button>
</form>
<?php /**PATH C:\Users\danig\Desktop\implTest\resources\views/transactions/create.blade.php ENDPATH**/ ?>