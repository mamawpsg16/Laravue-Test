import axios from 'axios';

export default{
    getComments:()=>{
        try {
            return axios.get('https://jsonplaceholder.typicode.com/comments');
        } catch (error) {
            console.log(error);            
        }
    }
}