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
                <LandingPage v-if="checkedItem === 'Course introduction'" />
                <CourseStructure  v-if="checkedItem === 'Course structure'" />
                <Film v-if="checkedItem === 'Film & edit'" />
                <Curriculum v-if="checkedItem === 'Curriculum'"  />
                <TargetStudent v-if="checkedItem === 'Target your students'" />
                <CourseMessage v-if="checkedItem === 'Course messages'" />
            </div>
        </div>
    </div>
</template>

<script>
import LandingPage from './plan/LandingPage'
import CourseStructure from './plan/CourseStructure'
import Film from './create/Film'
import Curriculum from './create/Curriculum'
import TargetStudent from './publish/TargetStudent'
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
            checkedItem: 'Course introduction',
            creations: [
                {
                    title: 'Plan your course',
                    body: ['Course introduction', 'Course structure'],
                },
                {
                    title: 'Create your content',
                    body: ['Film & edit', 'Curriculum'],
                },
                {
                    title: 'Your audience',
                    body: ['Target your students', 'Course messages'],
                },
            ],
            submit: false
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
