import courseService from '../../services/courseService.js'

export const namespaced = true

export const state = {
    courses: [],
    course: {},
    coursesTotal: 0,
    perPage: 10
}

export const mutations = {
    GET_COURSE(state, course) {
        state.course = course
    },
    GET_COURSES_TOTAL(state, coursesTotal) {
        state.coursesTotal = coursesTotal
    },
    ADD_COURSE(state, course) {
        state.courses = [...state.courses, course]
    }
}

export const actions = {
    createCourse({commit}, course) {
        return courseService.postCourse(course)
                .then(() => {
                    commit('ADD_COURSE', course)
                    const notification = {
                        type: 'success',
                        message: 'Your course has been created!'
                    }
                    dispatch('notification/add', notification, { root: true })
                })
                .catch(error => {
                    const notification = {
                        type: 'error',
                        message: 'There was a problem creating your course: ' + error.message
                    }
                    dispatch('notification/add', notification, { root: true })
                    throw error
                })
    },
    fetchCourses({ commit, dispatch, state }, { page }) {
        return courseService.getCourses(state.perPage, page)
            .then(response => {
                commit('GET_COURSES_TOTAL', parseInt(response.headers['x-total-count']))
                commit('GET_COURSE', response.data)
            })
            .catch(error => {
                const notification = {
                    type: 'error',
                    message: 'There was a problem fetching courses: ' + error.message
                }
                dispatch('notification/add', notification, { root: true })
            })
    },
    fetchCourse({ commit, getters, state }, id) {
        if (id == state.course.id) {
            return state.course
        }
        let course = getters.getCourseById(id)
        if (course) {
            commit('GET_COURSE', course)
            return course
        } else {
            return courseService.getCourse(id).then(response => {
                commit('GET_COURSE', response.data)
                return response.data
          })
        }
    }
}

export const getters = {
    courses: state => {
        return state.courses
    },
    getCourseById: state => id => {
        return state.courses.find(course => course.id === id)
    }
}
