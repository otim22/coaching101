import subjectService from '../../services/subjectService.js'

export const namespaced = true

// State
export const state = {
    subjects: [],
    subjectItem: {
        introduction: {
            subject_title: null,
            subject_subtitle: null,
            subject_description: null,
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
            done: false,
        },
        outlines: [
            {
                content_title: null,
                main_content_files: null,
                content_description: null,
                extra_resource_files: null,
                done: false
            }
        ],
        students_learn: [
            {
                students_learn: null,
                done: false
            }
        ],
        class_requirement: [
            {
                class_requirement: null,
                done: false
            }
        ],
        target_student: [
            {
                target_student: null,
                done: false
            }
        ],
        subject_message: {
            welcome_message: null,
            congratulations_message: null,
            done: false
        }
    }
}

// Mutations
export const mutations = {
    addSubject(state, subject) {
        state.subjects = [...state.subjects, subject]
    },
    getSubject(state, subject) {
        state.subject = subject
    },
    removeSubject(state, subject) {
        state.subjects.splice(state.subjects.indexOf(subject), 1)
    }
}

// Actions
export const actions = {
    createSubject({ commit, dispatch }, subject) {
        return subjectService.postSubject(subject)
                .then((res) => {
                    commit('addSubject', res.data)
                    const notification = {
                        type: 'success',
                        message: 'Your subject has been created!'
                    }
                    dispatch('notification/add', notification, { root: true })
                })
                .catch(error => {
                    const notification = {
                        type: 'error',
                        message: 'There was a problem creating your subject: ' + error.message
                    }
                    dispatch('notification/add', notification, { root: true })
                    throw error
                })
    }
}

// Getters
export const getters = {
    subjects: state => state.subjects,
    getSubjectById: state => id => {
        return state.subjects.find(subject => subject.id === id)
    }
}
