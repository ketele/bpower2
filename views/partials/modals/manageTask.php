<?php $this->beginBlock('modalBody'); ?>
    <form class="js-save-task-form" action="" id="manage-task-modal-form">
        <input type="hidden" name="id" value=""/>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input id="title" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">Author</label>
            <input id="user" class="form-control" name="user">
        </div>
    </form>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('modalFooter'); ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="manage-task-modal-form">Save changes</button>
<?php $this->endBlock(); ?>

<?= $this->render('@app/views/partials/modals/modal', [
    'modalClass' => 'js-open-manage-task-modal',
    'modalId' => 'manage-task-modal',
    'modalTitle' => 'Manage',
]); ?>