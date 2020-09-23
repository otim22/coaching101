<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 mt-5">
                <!-- <form id="subject-form" @keyup.enter="createCourse" enctype="multipart/form-data"> -->
                    <div class="mb-4" v-for="(creation, index) in creations">
                        <h5 class="side-font mb-3">{{ creation.title }}</h5>
                        <div class="form-check hover-me mb-2" v-for="elem in creation.body" :key="elem.key">
                            <label class="hover-me form-check-label" :for="elem">
                                <input class="form-check-input"
                                            type="checkbox"
                                            :id="elem"
                                            :value="elem"
                                            v-model="selected"
                                            @change="handleCheckSelection($event)">
                                        {{ elem }}
                            </label>
                        </div>
                    </div>
                    <a href="/subjects" class="btn btn-secondary mt-5">View subject</a>
                <!-- </form> -->
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9 fast-transition mt-2">
                <SubjectIntroduction v-if="checkedItem === 'Subject introduction'" />

                <SubjectStructure  v-if="checkedItem === 'Subject structure'" />

                <FilmSubject v-if="checkedItem === 'Film & edit'" />

                <SubjectOutline v-if="checkedItem === 'Subject outline'"
                                                        :outlines="subjectItem.outlines" />

                <TargetStudent v-if="checkedItem === 'Target your students'"
                                                :students_learn="subjectItem.students_learn"
                                                :class_requirement="subjectItem.class_requirement"
                                                :target_student="subjectItem.target_student" />

                <SubjectMessage v-if="checkedItem === 'Subject messages'"
                                                    :subject_message="subjectItem.subject_message" />
            </div>
        </div>
    </div>
</template>

<script>
import SubjectIntroduction from './plan/SubjectIntroduction'
import SubjectStructure from './plan/SubjectStructure'
import FilmSubject from './create/FilmSubject'
import SubjectOutline from './create/SubjectOutline'
import TargetStudent from './publish/TargetStudent'
import SubjectMessage from './publish/SubjectMessage'

export default {
    name: 'class-creation',
    components: {
        TargetStudent,
        SubjectStructure,
        FilmSubject,
        SubjectOutline,
        SubjectIntroduction,
        SubjectMessage
    },
    data() {
        return {
            selected: [],
            checkedItem: 'Subject introduction',
            creations: [
                {
                    title: 'Plan your subject',
                    body: ['Subject introduction', 'Subject structure'],
                },
                {
                    title: 'Create your content',
                    body: ['Film & edit', 'Subject outline'],
                },
                {
                    title: 'Your audience',
                    body: ['Target your students', 'Subject messages'],
                },
            ],
            submit: false
        };
    },
    computed: {
        subjectItem: {
            get() {
                return this.$store.state.subject.subjectItem
            },
            set(value) {
                this.subjectItem = value
            }
        }
    },
    methods: {
        createSubject() {
            this.submit = true
            this.$store.dispatch('subject/createSubject', this.subjectItem)
                                .then(() => {
                                    this.submit = false
                                })
                                .catch(error => {
                                    this.submit = false
                                })
        },
        handleCheckSelection($event) {
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
