import { mount } from '@vue/test-utils'
import axios from 'axios';
import * as subject from '../../../store/modules/subject.js'

describe('subject/getters', () => {
    it('should mount without crashing', () => {
        const wrapper = mount(subject)
        expect(wrapper).toMatchSnapshot()
    })

    it('it returns subjects', () => {
        const state = {
            subjects: [{
                introduction: {
                    subject_title: 'Subject title',
                    subject_subtitle: 'Subject subtitle',
                    subject_description: 'Subject description',
                },
                outlines: [
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
                subject_message: [
                    {
                        welcome_message: 'Welcome message',
                        congratulations_message: 'Congratulations message',
                        done: false
                    }
                ]
            }]
        }

        expect(subject.getters.subjects(state)).toBe(state.subjects)
    })
})

describe('subject/mutations', () => {
    test('addSubject adds a new subject', () => {
        const state = {
            subjects: []
        }
        const subjectItem = [{
            introduction: {
                subject_title: 'Subject title',
                class_options: [
                    "Senior one",
                    "Senior two",
                    "Senior three",
                    "Senior four",
                    "Senior five",
                    "Senior six",
               ],
               subject_description: "subject_description",
               subject_subtitle: "subject_subtitle",
               subject_title: "subject_title",
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
                subject_subtitle: "subject_subtitle",
                subject_description: "subject_description",
            },
            outlines: [
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
            subject_message: [
                {
                    welcome_message: "welcome_message",
                    congratulations_message: "congratulations_message",
                    done: false
                }
            ]
        }]
        subject.mutations.addSubject(state, subjectItem[0])
        expect([...state.subjects]).toMatchObject(subjectItem)
    })
})

/* To be continued*/
describe('subject/actions', () => {
    test('createSubject commits addSubject mutation', () => {
        jest.mock('axios');
        const commit = jest.fn()
        const subjectItem = [{
            introduction: {
                subject_title: 'Subject title',
                class_options: [
                    "Senior one",
                    "Senior two",
                    "Senior three",
                    "Senior four",
                    "Senior five",
                    "Senior six",
               ],
               subject_description: "subject_description",
               subject_subtitle: "subject_subtitle",
               subject_title: "subject_title",
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
                subject_subtitle: "subject_subtitle",
                subject_description: "subject_description",
            },
            outlines: [
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
            subject_message: [
                {
                    welcome_message: "welcome_message",
                    congratulations_message: "congratulations_message",
                    done: false
                }
            ]
        }]

        axios.post('/subjects', subjectItem)
            .then(data => {
                subject.actions.createSubject({ commit }, subjectItem)
                expect(commit).toHaveBeenCalledWith('addSubject', 1)
            })
    })
})
