import {Ajax} from './ajax.js'


class UserRegistration extends Ajax
{
    constructor()
    {
        super(document.getElementById('signup-form'))
    }

    /**
     * @param {Event} event
     */
    async submit(event)
    {
        console.debug('UserAuth::validate(event)', event)

        this.hideMessage()

        // HTML5 ellenörzés
        let isValid = this.form.checkValidity()

        // Jelszó ellenörzés (client-side)
        const password = document.getElementById('signup-password')
        const passwordVerification = document.getElementById('signup-passwordVerification')

        passwordVerification.setCustomValidity('')
        if (password.value !== passwordVerification.value) {
            passwordVerification.setCustomValidity('A jelszavak nem eggyeznek!')
            isValid = false
        }

        if (isValid) {
            return await super.submit(event)
        }
    }
}

window.userRegistration = new UserRegistration();