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
    postCourse(course) {
        return apiClient.post('/lectures', course)
    },
    getCourse(id) {
        return apiClient.get('/lectures/' + id)
    }
}
