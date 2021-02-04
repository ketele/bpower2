import {Alert} from './Alert.js';

export class TasksManager {
    constructor() {
        this.bindUIEvents();
    }

    bindUIEvents() {
        $('.js-open-manage-task-modal').on('shown.bs.modal', e => {

            const $modal = $(e.target);
            const $invoker = $(e.relatedTarget);
            const taskId = $invoker.data('id');

            if (taskId) {
                this.fetchTask(taskId)
                    .then(response => response.json()
                        .then(data => {
                            if (response.status < 300) {
                                $modal.find('[name="id"]').val(data.id);
                                $modal.find('[name="title"]').val(data.title);
                                $modal.find('[name="user"]').val(data.user);
                            }
                        }));
            } else {
                $modal.find('[name="id"]').val('');
                $modal.find('[name="title"]').val('');
                $modal.find('[name="user"]').val('');
            }
        });

        $('.js-save-task-form').on('submit', e => {
            e.preventDefault();

            const data = new FormData(e.target);
            const taskId = data.get('id');

            (taskId) ? this.updateTask(data) : this.createTask(data)
        });

        $('.js-open-change-task-status-modal').on('shown.bs.modal', e => {

            const $modal = $(e.target);
            const $invoker = $(e.relatedTarget);
            const taskId = $invoker.data('id');

            if (taskId) {
                this.fetchTask(taskId)
                    .then(response => response.json()
                        .then(data => {
                            if (response.status < 300) {
                                $modal.find('[name="id"]').val(data.id);
                                $modal.find('[name="status_id"]').val(data.status_id).change();
                            }
                        }));
            }
        });

        $('.js-change-task-status-form').on('submit', e => {
            e.preventDefault();

            const data = new FormData(e.target);

            this.patchTask(data);
        });

        $('.js-open-delete-task-modal').on('shown.bs.modal', e => {

            const $modal = $(e.target);
            const $invoker = $(e.relatedTarget);
            const taskId = $invoker.data('id');

            $modal.find('[name="id"]').val(taskId);
        });

        $('.js-delete-task-form').on('submit', e => {
            e.preventDefault();

            const data = new FormData(e.target);

            this.deleteTask(data);
        });

    }

     createTask(data) {
        fetch(`/tasks`, { method: 'POST', body: data })
        .then(response => {
            if (response.status < 300) {
                window.location.reload();
            } else {
                response.json().then(data => {
                    const errorText = (data.message.length)
                        ? data.message
                        : `Error: ${response.status} ${response.statusText}`;

                    Alert.show('#delete-task-status-modal .modal-body', errorText);
                });
            }
        });
    }

    updateTask(data) {
        const queryString = new URLSearchParams(data).toString();
        fetch(`/tasks/${data.get('id')}`, {
            method: 'PUT',
            body: queryString
        })
        .then(response => {
            if (response.status < 300) {
                window.location.reload();
            } else {
                response.json().then(data => {
                    const errorText = (data.message.length)
                        ? data.message
                        : `Error: ${response.status} ${response.statusText}`;

                    Alert.show('#delete-task-status-modal .modal-body', errorText);
                });
            }
        });
    }

    patchTask(data) {
        const queryString = new URLSearchParams(data).toString();

        fetch(`/tasks/${data.get('id')}`, {method: 'PATCH', body: queryString})
            .then(response => response.json().then(data => {
                if (response.status < 300) {
                    window.location.reload();
                } else {
                    response.json().then(data => {
                        const errorText = (data.message.length)
                            ? data.message
                            : `Error: ${response.status} ${response.statusText}`;

                        Alert.show('#delete-task-status-modal .modal-body', errorText);
                    });
                }
            }));
    }

    deleteTask(data) {
        fetch(`/tasks/${data.get('id')}`, {method: 'DELETE'})
            .then(response => {
                if (response.status < 300) {
                    window.location.reload();
                } else {
                    response.json().then(data => {
                        const errorText = (data.message.length)
                            ? data.message
                            : `Error: ${response.status} ${response.statusText}`;

                        Alert.show('#delete-task-status-modal .modal-body', errorText);
                    });
                }
            });
    }

    fetchTask(taskId) {
        return fetch(`/tasks/${taskId}`, { method: 'GET' });
    }

}