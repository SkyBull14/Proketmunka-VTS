export class Ajax {

    constructor(form)
    {
        this._form = form
        this._message = this.form.querySelector('.ajax-message')
        this._button = this.form.querySelector('button[type="submit"]')

        this.hideMessage()
        this.hideLoader()

        console.debug(`Ajax::constructor()`, {
            form: this.form,
            message: this.message,
            button: this.button,
        })

        this.form.addEventListener('submit', this.submit.bind(this))
    }

    /** @return HTMLFormElement */
    get form() {
        return this._form;
    }

    /** @return HTMLDivElement */
    get message() {
        return this._message
    }

    /** @return HTMLButtonElement */
    get button() {
        return this._button
    }

    /**
     * @param {Event} event
     */
    async submit(event) {
        console.debug('Ajax::submit()')
        event.stopPropagation()
        event.preventDefault()

        this.showLoader()

        const uri = this.form.action
        const data = new FormData(this.form)

        console.debug(`>>> ${uri}`, data)
        const response = await fetch(uri, {
            method: this.form.method,
            body: data,
        })
        console.debug('<<<', response.status)
        this.hideLoader()

        if (response.status === 200 && this.form.dataset.redirect)
            return window.location.href = this.form.dataset.redirect;

        const res = await response.json()
        if (res.error)
        {
            this.setMessage(res.error)
            this.showMessage()
        }
    }

    hideMessage() {
        if (!this.message) return;

        this.message.classList.remove('message-shown')
        this.message.classList.add('message-hidden')
    }

    setMessage(text) {
        if (!this.message) return;

        this.message.textContent = text
    }

    showMessage() {
        if (!this.message) return;

        this.message.classList.remove('message-hidden')
        this.message.classList.add('message-shown')
    }

    hideLoader() {

        if (!this.button) return;


        this.button.disabled = false
        this.button.classList.remove('spinner-shown')
        this.button.classList.add('spinner-hidden')
    }

    showLoader() {
        this.button.disabled = true
        this.button.classList.remove('spinner-hidden')
        this.button.classList.add('spinner-shown')
    }
}