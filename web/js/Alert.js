export class Alert {
    static hide() {
        $('.js-modal-error').fadeOut();
    }

    static show(selector, errorMessage) {
        this.hide();

        const errorTemplate = `
            <div class="alert alert-danger js-modal-error" role="alert">${errorMessage}</div>
        `;

        $(selector).prepend(errorTemplate);
    }
}
