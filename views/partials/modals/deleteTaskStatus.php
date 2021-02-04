<?php $this->beginBlock('modalBody'); ?>
    <form id="delete-task-status-form" action="" class="js-delete-task-status-form">
        <input type="hidden" name="id" value=""/>
        <div class="mb-3">
            Are you sure you want to delete this status?
        </div>
    </form>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('modalFooter'); ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="delete-task-status-form">Submit</button>
<?php $this->endBlock(); ?>

<?= $this->render('@app/views/partials/modals/modal', [
    'modalClass' => 'js-open-delete-task-status-modal',
    'modalId' => 'delete-task-status-modal',
    'modalTitle' => 'Delete status',
]); ?>