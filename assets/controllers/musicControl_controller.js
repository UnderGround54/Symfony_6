import { Controller } from '@hotwired/stimulus';
import axios from 'axios';

export default class extends Controller {

    static values = {
        infoUrl: String,
    }
    
    pause(event){
        event.preventDefault();
        axios.get(this.infoUrlValue).then((response) => {
            const audio = new Audio(response.data.url);
            audio.pause();
        });
    }
    
    play(event){
        event.preventDefault();
        axios.get(this.infoUrlValue).then((response) => {
            const audio = new Audio(response.data.url);
            audio.play();
            
        });
    }

    
}
