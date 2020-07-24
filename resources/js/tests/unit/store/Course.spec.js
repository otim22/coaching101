import { mount } from '@vue/test-utils'
import axios from 'axios';
import * as course from '../../../store/modules/course.js'

describe('course/getters', () => {
    it('should mount without crashing', () => {
        const wrapper = mount(course)
        expect(wrapper).toMatchSnapshot()
    })

    it('it returns courses', () => {
        const state = {
            courses: [{
                introduction: {
                    course_title: 'Course title',
                    course_subtitle: 'Course subtitle',
                    course_description: 'Course description',
                },
                curriculums: [
                    {
                        content_title: 'Content title',
                        main_content_files: [],
                        done: false
                    }
                ],
                students_learn: [
                    {
                        students_learn: 'Student learn',
                        done: false
                    }
                ],
                class_requirement: [
                    {
                        class_requirement: 'Class requirement',
                        done: false
                    }
                ],
                target_student: [
                    {
                        target_student: 'Target student',
                        done: false
                    }
                ],
                course_message: [
                    {
                        welcome_message: 'Welcome message',
                        congratulations_message: 'Congratulations message',
                        done: false
                    }
                ]
            }]
        }

        expect(course.getters.courses(state)).toBe(state.courses)
    })
})

describe('course/mutations', () => {
    test('addCourse adds a new course', () => {
        const state = {
            courses: []
        }
        const courseItem = [{
            introduction: {
                course_title: 'Course title',
                class_options: [
                    "Senior one",
                    "Senior two",
                    "Senior three",
                    "Senior four",
                    "Senior five",
                    "Senior six",
               ],
               course_description: "course_description",
               course_subtitle: "course_subtitle",
               course_title: "course_title",
               default_class: "-- Class --",
               default_level: "-- Level --",
               default_subject: "-- Subject --",
               done: false,
               level_options: [
                   "Term one",
                   "Term two",
                   "Term three",
               ],
               subject_options: [
                    "Mathematics",
                    "Science",
                    "English",
                    "Chemistry",
                    "Biology",
                    "Swahili",
                    "French",
                    "Agriculture",
                    "Food & nutrition",
                    "Social Studies",
                    "CRE",
                    "IRE",
                    "Geography",
                    "Entreprenuership",
                    "Commerce",
                    "Accounts",
                    "Economics",
                    "Divinity",
                    "History",
               ],
                course_subtitle: "course_subtitle",
                course_description: "course_description",
            },
            curriculums: [
                {
                    content_title: "content_title",
                    content_description: "content_description",
                    main_content_files: [],
                    extra_resource_files: [],
                    done: false
                }
            ],
            students_learn: [
                {
                    students_learn: "students_learn",
                    done: false
                }
            ],
            class_requirement: [
                {
                    class_requirement: "class_requirement",
                    done: false
                }
            ],
            target_student: [
                {
                    target_student: "target_student",
                    done: false
                }
            ],
            course_message: [
                {
                    welcome_message: "welcome_message",
                    congratulations_message: "congratulations_message",
                    done: false
                }
            ]
        }]
        course.mutations.addCourse(state, courseItem[0])
        expect([...state.courses]).toMatchObject(courseItem)
    })
})

/* To be continued*/
describe('course/actions', () => {
    test('createCourse commits addCourse mutation', () => {
        jest.mock('axios');
        const commit = jest.fn()
        const courseItem = [{
            introduction: {
                course_title: 'Course title',
                class_options: [
                    "Senior one",
                    "Senior two",
                    "Senior three",
                    "Senior four",
                    "Senior five",
                    "Senior six",
               ],
               course_description: "course_description",
               course_subtitle: "course_subtitle",
               course_title: "course_title",
               default_class: "-- Class --",
               default_level: "-- Level --",
               default_subject: "-- Subject --",
               done: false,
               level_options: [
                   "Term one",
                   "Term two",
                   "Term three",
               ],
               subject_options: [
                    "Mathematics",
                    "Science",
                    "English",
                    "Chemistry",
                    "Biology",
                    "Swahili",
                    "French",
                    "Agriculture",
                    "Food & nutrition",
                    "Social Studies",
                    "CRE",
                    "IRE",
                    "Geography",
                    "Entreprenuership",
                    "Commerce",
                    "Accounts",
                    "Economics",
                    "Divinity",
                    "History",
               ],
                course_subtitle: "course_subtitle",
                course_description: "course_description",
            },
            curriculums: [
                {
                    content_title: "content_title",
                    content_description: "content_description",
                    main_content_files: [],
                    extra_resource_files: [],
                    done: false
                }
            ],
            students_learn: [
                {
                    students_learn: "students_learn",
                    done: false
                }
            ],
            class_requirement: [
                {
                    class_requirement: "class_requirement",
                    done: false
                }
            ],
            target_student: [
                {
                    target_student: "target_student",
                    done: false
                }
            ],
            course_message: [
                {
                    welcome_message: "welcome_message",
                    congratulations_message: "congratulations_message",
                    done: false
                }
            ]
        }]

        axios.post('/courses', courseItem)
            .then(data => {
                course.actions.createCourse({ commit }, courseItem)
                expect(commit).toHaveBeenCalledWith('addCourse', 1)
            })
    })
})
