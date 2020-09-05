import axios from 'axios'

const apiClient = axios.create({
    baseURL: `https://coaching101.app`,
    withCredentials: false,      // This is the default
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    },
    timeout: 10000
})

export default {
    postSubject(subject) {
        return apiClient.post('/lectures', subject)
    },
    getSubject(id) {
        return apiClient.get('/lectures/' + id)
    }
}
