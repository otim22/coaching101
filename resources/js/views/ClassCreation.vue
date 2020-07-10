<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 mt-5">
                <form id="course-form" @keyup.enter="createCourse" enctype="multipart/form-data">
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
                <CourseIntroduction v-if="checkedItem === 'Course introduction'" :introduction="courseItem.introduction" />
                <CourseStructure  v-if="checkedItem === 'Course structure'" />
                <FilmCourse v-if="checkedItem === 'Film & edit'" />
                <CourseCurriculum v-if="checkedItem === 'CourseCurriculum'" :curriculums="courseItem.curriculums" />
                <TargetStudent v-if="checkedItem === 'Target your students'" :students_learn="courseItem.students_learn" :class_requirement="courseItem.class_requirement" :target_student="courseItem.target_student" />
                <CourseMessage v-if="checkedItem === 'Course messages'" :course_message="courseItem.course_message" />
            </div>
        </div>
    </div>
</template>

<script>
import CourseIntroduction from './plan/CourseIntroduction'
import CourseStructure from './plan/CourseStructure'
import FilmCourse from './create/FilmCourse'
import CourseCurriculum from './create/CourseCurriculum'
import TargetStudent from './publish/TargetStudent'
import CourseMessage from './publish/CourseMessage'

export default {
    name: 'class-creation',
    components: {
        TargetStudent,
        CourseStructure,
        FilmCourse,
        CourseCurriculum,
        CourseIntroduction,
        CourseMessage
    },
    data() {
        return {
            selected: [],
            checkedItem: 'Course introduction',
            creations: [
                {
                    title: 'Plan your course',
                    body: ['Course introduction', 'Course structure'],
                },
                {
                    title: 'Create your content',
                    body: ['Film & edit', 'CourseCurriculum'],
                },
                {
                    title: 'Your audience',
                    body: ['Target your students', 'Course messages'],
                },
            ],
            submit: false
        };
    },
    computed: {
        courseItem: {
            get() {
                return this.$store.state.course.courseItem
            },
            set(value) {
                this.courseItem = value
            }
        }
    },
    methods: {
        createCourse() {
            this.submit = true;
            this.$store.dispatch('course/createCourse', this.courseItem)
                .then(() => {
                    this.submit = false;
                })
                .catch(error => {
                    this.submit = false
                })
        },
        pickSelected($event) {
            this.checkedItem = $event.target.defaultValue
        }
    }
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
