<?php $this->beginBlock('modalBody'); ?>
    <form id="manage-task-status-modal-form" action="" class="js-save-task-status-form">
        <input type="hidden" name="id" value=""/>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" class="form-control" name="name"/>
        </div>
    </form>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('modalFooter'); ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="manage-task-status-modal-form">Save changes</button>
<?php $this->endBlock(); ?>

<?= $this->render('@app/views/partials/modals/modal', [
    'modalClass' => 'js-open-manage-task-status-modal',
    'modalId' => 'manage-task-status-modal',
    'modalTitle' => 'Manage Status',
]); ?>