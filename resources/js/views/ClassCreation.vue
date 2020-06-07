<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 mt-5">
                <form @keyup.enter="createCourse" enctype="multipart/form-data">
                    <div class="mb-4" v-for="(creation, index) in creations">
                        <h5 class="side-font mb-3">{{ creation.title }}</h5>
                        <div class="form-check hover-me mb-2" v-for="elem in creation.body" :key="elem.key">
                            <label class="hover-me form-check-label" :for="elem">
                            <input class="form-check-input"
                                        type="checkbox"
                                        :id="elem"
                                        :value="elem"
                                        v-model="selected"
                                        @change="pickSelected($event)">
                                        {{ elem }}
                                </label>
                        </div>
                    </div>
                    <button @click.prevent="createCourse" type="submit" class="btn btn-primary mt-5">Submit for review</button>
                </form>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 fast-transition mt-2">
                <TargetStudent v-if="checkedItem === 'Target your students'" :students_learn="students_learn" :class_requirement="class_requirement" :target_students="target_students" />
                <CourseStructure  v-if="checkedItem === 'Course structure'" />
                <Film v-if="checkedItem === 'Film & edit'" />
                <Curriculum v-if="checkedItem === 'Curriculum'" :curriculums="curriculums"  />
                <LandingPage v-if="checkedItem === 'Course landing page'" :landing="landing" />
                <CourseMessage v-if="checkedItem === 'Course messages'" :courseMessage="courseMessage"  />
            </div>
        </div>
    </div>
</template>

<script>
import TargetStudent from './plan/TargetStudent'
import CourseStructure from './plan/CourseStructure'
import Film from './create/Film'
import Curriculum from './create/Curriculum'
import LandingPage from './publish/LandingPage'
import CourseMessage from './publish/CourseMessage'

export default {
    name: 'class-creation',
    components: {
        TargetStudent,
        CourseStructure,
        Film,
        Curriculum,
        LandingPage,
        CourseMessage
    },
    data() {
        return {
            selected: [],
            checkedItem: 'Curriculum',
            creations: [
                {
                    title: 'Plan your course',
                    body: ['Target your students', 'Course structure'],
                },
                {
                    title: 'Create your content',
                    body: ['Film & edit', 'Curriculum'],
                },
                {
                    title: 'Publish your course',
                    body: ['Course landing page', 'Course messages'],
                },
            ],
            submit: false,
            students_learn: [
                { students_learn: null }
            ],
            class_requirement: [
                { class_requirement: null }
            ],
            target_students: [
                { target_students: null }
            ],
            curriculums: [
                {
                    content_title: null,
                    main_content_files: null,
                    content_description: null,
                    extra_resource_files: null
                }
            ],
            landing: {
                course_title: null,
                course_subtitle: null,
                course_description: null,
                default_subject: '-- Subject --',
                selected_subjects: [
                    'Mathematics', 'Science', 'English', 'Chemistry','Biology', 'Swahili', 'French', 'Agriculture',
                    'Food & nutrition', 'Social Studies', 'CRE', 'IRE','Geography','Entreprenuership', 'Commerce',
                    'Accounts', 'Economics', 'Divinity','History'
                ],
                default_class: '-- Class --',
                selected_classes: ['Senior one', 'Senior two', 'Senior three', 'Senior four', 'Senior five', 'Senior six'],
                default_level: '-- Level --',
                selected_levels: ['Term one', 'Term two', 'Term three'],
            },
            courseMessage: {
                welcome_message: null,
                congratulations_message: null,
            },
        };
    },
    methods: {
        createCourse() {
            this.submit = true;
            this.$store.dispatch('course/createCourse', this.course)
                                .then(() => {
                                    this.submit = false;
                                })
                                .catch(error => {
                                    this.submit = false
                                })
            this.course = null
        },
        pickSelected($event) {
            this.checkedItem = $event.target.defaultValue
        }
    }
    // computed: {
    //     pickSelected: function() {
    //         for (let i = 0; i < this.selected.length; i++) {
    //           this.checkedItem = this.selected[i];
    //         }
    //     }
    // }
}
</script>

<style lang="scss" scoped>
    .hover-me {
        cursor: pointer;
    }
    .hover-me:hover {
        background-color: #f0f0f0;
    }
</style>
