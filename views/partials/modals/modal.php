<div class="modal fade <?= $modalClass ?>" tabindex="-1" role="dialog" id="<?= $modalId ?>" aria-labelledby="<?= $modalId; ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <?= $modalTitle ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php if (isset($this->blocks['modalBody'])): ?>
                    <?= $this->blocks['modalBody'] ?>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <?php if (isset($this->blocks['modalFooter'])): ?>
                    <?= $this->blocks['modalFooter'] ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>