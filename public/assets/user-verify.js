import {Ajax} from './ajax.js'

class ResetVerify extends Ajax
{
    constructor()
    {
        super(document.getElementById('activation-code'))
    }
}

window.resetVerify = new ResetVerify()