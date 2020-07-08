import courseService from '../../services/courseService.js'

export const namespaced = true

export const state = {
    courses: [],
    courseItem: {
        introduction: {
            course_title: null,
            course_subtitle: null,
            course_description: null,
            default_subject: '-- Subject --',
            subject_options: [
                'Mathematics', 'Science', 'English', 'Chemistry','Biology', 'Swahili', 'French', 'Agriculture',
                'Food & nutrition', 'Social Studies', 'CRE', 'IRE','Geography','Entreprenuership', 'Commerce',
                'Accounts', 'Economics', 'Divinity','History'
            ],
            default_class: '-- Class --',
            class_options: ['Senior one', 'Senior two', 'Senior three', 'Senior four', 'Senior five', 'Senior six'],
            default_level: '-- Level --',
            level_options: ['Term one', 'Term two', 'Term three'],
        },
        curriculums: [
            {
                content_title: null,
                main_content_files: [],
                content_description: null,
                extra_resource_files: []
            }
        ],
        students_learn: [
            { students_learn: null }
        ],
        class_requirement: [
            { class_requirement: null }
        ],
        target_student: [
            { target_student: null }
        ],
        course_message: {
            welcome_message: null,
            congratulations_message: null,
        }
    }
}

// Mutations
export const mutations = {
    addCourse(state, course) {
        state.courses = [...state.courses, course]
    },
    removeCourse(state, course) {
        state.courses.splice(state.courses.indexOf(course), 1)
    },
    getCourse(state, course) {
        state.course = course
    }
}

// Actions
export const actions = {
    createCourse({ commit, dispatch }, course) {
        return courseService.postCourse(course)
                .then((res) => {
                    commit('addCourse', res.data)
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
    }
}

// Getters
export const getters = {
    courses: state => state.courses,
    getCourseById: state => id => {
        return state.courses.find(course => course.id === id)
    }
}
