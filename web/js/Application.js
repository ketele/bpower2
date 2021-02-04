import {TasksManager} from './TasksManager.js';
import {TasksStatusManager} from './TasksStatusManager.js';

export class Application {
    run() {
        this.tasksManager = new TasksManager();
        this.tasksStatusManager = new TasksStatusManager();
    }
}

