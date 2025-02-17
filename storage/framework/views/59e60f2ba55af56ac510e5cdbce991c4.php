<!DOCTYPE html>
<html>
<head>
    <title>Contacts CRUD Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* For the contact list with scrollbar */
        .scrollable-table {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
              <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/contactCrud/contact-crud-app/resources/views/layout.blade.php ENDPATH**/ ?>