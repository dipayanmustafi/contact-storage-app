<?php $__env->startSection('content'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h2>Contacts</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="<?php echo e(route('contacts.create')); ?>" class="btn btn-primary">Add Contact</a>
    </div>
</div>

<!-- Search Form -->
<form method="GET" action="<?php echo e(route('contacts.index')); ?>" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search contacts..." value="<?php echo e(request('search')); ?>">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">Search</button>
        </div>
    </div>
</form>

<!-- Import Form -->
<form method="POST" action="<?php echo e(route('contacts.import')); ?>" enctype="multipart/form-data" class="mb-3">
    <?php echo csrf_field(); ?>
    <div class="form-group">
        <label for="xml_file">Import Contacts (XML file)</label>
        <input type="file" name="xml_file" id="xml_file" class="form-control-file" required>
    </div>
    <button type="submit" class="btn btn-info">Import Contacts</button>
</form>

<!-- Contacts List -->
<div class="scrollable-table">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th width="180">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($contact->id); ?></td>
                    <td><?php echo e($contact->name); ?></td>
                    <td><?php echo e($contact->phone); ?></td>
                    <td><?php echo e($contact->email); ?></td>
                    <td><?php echo e($contact->address); ?></td>
                    <td>
                        <a href="<?php echo e(route('contacts.edit', $contact->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('contacts.destroy', $contact->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6">No contacts found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/contactCrud/contact-crud-app/resources/views/contacts/index.blade.php ENDPATH**/ ?>