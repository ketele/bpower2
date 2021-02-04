<?php $this->beginBlock('modalBody'); ?>
    <form id="delete-task-modal-form" action="" class="js-delete-task-form">
        <input type="hidden" name="id" value=""/>
        <div class="mb-3">
            Are you sure you want to delete this task?
        </div>
    </form>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('modalFooter'); ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="delete-task-modal-form">Submit</button>
<?php $this->endBlock(); ?>

<?= $this->render('@app/views/partials/modals/modal', [
    'modalClass' => 'js-open-delete-task-modal',
    'modalId' => 'delete-task-modal',
    'modalTitle' => 'Manage',
]); ?>