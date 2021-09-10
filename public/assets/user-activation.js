import {Ajax} from './ajax.js'


class UserActivation extends Ajax
{
    constructor()
    {
        super(document.getElementById('activation-form'))
        const code = this.form.querySelector('input#activation-code')
        if (code.value !== '')
            this.submit(new CustomEvent('auto-submit'))
    }
}

window.userActivation = new UserActivation()