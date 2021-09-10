import {Ajax} from './ajax.js'

class UserResetRequest extends Ajax
{
    constructor()
    {
        super(document.getElementById('reset-request'))
    }
}

window.userResetRequest = new UserResetRequest();