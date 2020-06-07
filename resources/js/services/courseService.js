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
    getCourses(perPage, page) {
        return apiClient.get('/courses?_limit=' + perPage + '&_page=' + page )
    },
    getCourse(id) {
        return apiClient.get('/courses/' + id)
    },
    postCourse(course) {
        return apiClient.post('/courses', course)
    }
}
