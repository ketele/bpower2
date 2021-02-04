import {Alert} from './Alert.js';

export class TasksStatusManager {
    constructor() {
        this.bindUIEvents();
    }

    bindUIEvents() {
        $('.js-open-manage-task-status-modal').on('shown.bs.modal', e => {
            const $modal = $(e.target);
            const $invoker = $(e.relatedTarget);
            const taskId = $invoker.data('id');

            if (taskId) {
                this.fetchStatus(taskId)
                    .then(response => response.json()
                        .then(data => {
                            if (response.status < 300) {
                                $modal.find('[name="id"]').val(data.id);
                                $modal.find('[name="name"]').val(data.name);
                            }
                        }));
            } else {
                $modal.find('[name="id"]').val('');
                $modal.find('[name="name"]').val('');
            }
        });

        $('.js-save-task-status-form').on('submit', e => {
            e.preventDefault();

            const data = new FormData(e.target);
            const taskId = data.get('id');

            (taskId) ? this.updateStatus(data) : this.createStatus(data)
        });

        $('.js-open-delete-task-status-modal').on('shown.bs.modal', e => {

            const $modal = $(e.target);
            const $invoker = $(e.relatedTarget);
            const taskId = $invoker.data('id');

            $modal.find('[name="id"]').val(taskId);
        });

        $('.js-delete-task-status-form').on('submit', e => {
            e.preventDefault();

            const data = new FormData(e.target);

            this.deleteStatus(data);
        });

        $('.modal').on('hidden.bs.modal', e => {
            Alert.hide();
        });

    }

     createStatus(data) {
        fetch(`/statuses`, { method: 'POST', body: data })
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

    updateStatus(data) {
        const queryString = new URLSearchParams(data).toString();
        fetch(`/statuses/${data.get('id')}`, { method: 'PUT', body: queryString })
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

    deleteStatus(data) {
        fetch(`/statuses/${data.get('id')}`, {method: 'DELETE'})
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

    fetchStatus(taskId) {
        return fetch(`/statuses/${taskId}`, { method: 'GET' });
    }
}