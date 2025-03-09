<div>
    <h1>Transactions</h1>
    <a href="<?php echo e(route('transactions.create')); ?>">Add Transaction</a>

    <?php if($transactions->isEmpty()): ?>
        <p>No reservations found.</p>
    <?php else: ?>
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
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($transaction->employeeNameSurname); ?></td>
                    <td><?php echo e($transaction->senderNameSurname); ?></td>
                    <td><?php echo e($transaction->receiverNameSurname); ?></td>
                    <td><?php echo e($transaction->senderTransaction); ?></td>
                    <td><?php echo e($transaction->receiverTransaction); ?></td>
                    <td><?php echo e($transaction->price); ?></td>
                    <td><?php echo e($transaction->date); ?></td>
                    <td>
                        <a href="<?php echo e(route('transactions.edit', $transaction->id)); ?>">Update</a>
                        <form action="<?php echo e(route('transactions.destroy', $transaction->id)); ?>" method="POST"
                              style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this transaction?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php /**PATH C:\Users\danig\Desktop\implTest\resources\views/transactions/index.blade.php ENDPATH**/ ?>