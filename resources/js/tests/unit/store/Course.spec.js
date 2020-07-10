import { mount } from '@vue/test-utils'
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
