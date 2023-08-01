import axios from 'axios';

export default function data(){
    try {
        return axios.get('https://jsonplaceholder.typicode.com/users');
    } catch (error) {
        
    }
}