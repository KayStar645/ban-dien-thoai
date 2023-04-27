import axios from 'axios';

const baseURL = location.origin + '/';
const token = document.head.querySelector('meta[name="csrf-token"]');

export default axios.create(
    {
        baseURL,
        header: {
            'X-CSRF-TOKEN': token.content,
        },
        withCredentials: true,
    },
);
