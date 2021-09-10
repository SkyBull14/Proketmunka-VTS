import {Ajax} from './ajax.js'

class UserPasswordReset extends Ajax
{
    constructor()
    {
        super(document.getElementById('reset-password-form'))
        this.#form.addEventListener('submit', this.validate.bind(this))
    }

    /**
     * @param {Event} event
     */
    async submit(event)
    {
        console.debug('UserAuth::validate(event)', event)
        event.stopPropagation()
        event.preventDefault()

        this.hideMessage()

        // HTML5 ellenörzés
        let isValid = this.#form.checkValidity()

        // Jelszó ellenörzés (client-side)
        const password = document.getElementById('signup-password')
        const passwordVerification = document.getElementById('signup-passwordVerification')

        passwordVerification.setCustomValidity('')
        if (password.value !== passwordVerification.value) {
            passwordVerification.setCustomValidity('A jelszavak nem eggyeznek!')
            isValid = false
        }

        if (isValid) {
            return await this.submit()
        }
    }

}

window.userPasswordReset = new UserPasswordReset();
