<?php $this->beginBlock('modalBody'); ?>
    <form class="js-change-task-status-form" action="" id="change-task-status-modal-form">
        <input type="hidden" name="id" value=""/>
        <div class="mb-3">
            <select name="status_id" class="form-select" aria-label="None">
                <?php foreach($statuses as $status): ?>
                    <option value="<?= $status->id ?>"><?= $status->name ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </form>
<?php $this->endBlock(); ?>

<?php $this->beginBlock('modalFooter'); ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary" form="change-task-status-modal-form">Save changes</button>
<?php $this->endBlock(); ?>

<?= $this->render('@app/views/partials/modals/modal', [
    'modalClass' => 'js-open-change-task-status-modal',
    'modalId' => 'change-task-status-modal',
    'modalTitle' => 'Change status',
]); ?>