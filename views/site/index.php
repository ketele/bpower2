<?php

use yii\helpers\Html;

$this->title = 'Tasks';

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <a href="#" class="manage-task btn btn-default" data-id="" data-toggle="modal" data-target="#manage-task-modal">
                Add Task
            </a>
            <a href="#" class="manage-status btn btn-default" data-id="" data-toggle="modal" data-target="#manage-task-status-modal">
                Add Status
            </a>
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach($statuses as $status) { ?>
            <div class="col-lg-4">
                <h2><?= Html::encode($status->name) ?>
                    <?php if($status->removable) { ?>
                <a href="#"
                   class="manage-status btn btn-default btn-sm"
                   data-id="<?= $status->id ?>"
                   data-toggle="modal"
                   data-target="#manage-task-status-modal">
                    Edit
                </a>
                <a href="#"
                   class="delete-status btn btn-default btn-sm"
                   data-id="<?= $status->id ?>"
                   data-toggle="modal"
                   data-target="#delete-task-status-modal">
                    Delete
                </a>
                    <?php } ?>
                </h2>
                <?php foreach($status->tasks as $task) { ?>
                <div class="col-lg-12 bg-warning">
                    <p>
                       <?= Html::encode($task->title) ?>
                    </p>
                    <p>
                        <b>Author: </b><?= Html::encode($task->user) ?>
                    </p>
                    <p>
                        <a href="#" class="btn btn-warning btn-sm change-task-status"
                           data-id="<?= $task->id ?>"
                           data-toggle="modal"
                           data-target="#change-task-status-modal">
                           Change status
                        </a>
                        <a href="#" class="manage-task btn btn-warning btn-sm"
                           data-id="<?= $task->id ?>"
                           data-toggle="modal"
                           data-target="#manage-task-modal">
                            Edit
                        </a>
                        <a href="#" class="delete-task btn btn-warning btn-sm"
                           data-id="<?= $task->id ?>"
                           data-toggle="modal"
                           data-target="#delete-task-modal">
                            Delete
                        </a>
                    </p>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>

    </div>
</div>

<?= $this->render('@app/views/partials/modals/changeTaskStatus', ['statuses' => $statuses]) ?>
<?= $this->render('@app/views/partials/modals/manageTask') ?>
<?= $this->render('@app/views/partials/modals/deleteTask') ?>
<?= $this->render('@app/views/partials/modals/manageStatus') ?>
<?= $this->render('@app/views/partials/modals/deleteTaskStatus') ?>











