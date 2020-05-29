<template>
    <div class="container">
        <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3 mt-5">
                    <form @keyup.enter="createCourse">
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
                <TargetStudent v-show="checkedItem === 'Target your students'" :course="course" />
                <CourseStructure  v-show="checkedItem === 'Course structure'" :course="course" />
                <SetupTest v-show="checkedItem === 'Setup & test video'" :course="course"  />
                <Film v-show="checkedItem === 'Film & edit'" :course="course"  />
                <Curriculum v-show="checkedItem === 'Curriculum'" :course="course"  />
                <LandingPage v-show="checkedItem === 'Course landing page'" :course="course"  />
                <Pricing v-show="checkedItem === 'Pricing'" :course="course"  />
                <Promotion v-show="checkedItem === 'Promotions'" :course="course"  />
                <CourseMessage v-show="checkedItem === 'Course messages'" :course="course"  />
            </div>
        </div>
    </div>
</template>

<script>
import TargetStudent from './plan/TargetStudent'
import CourseStructure from './plan/CourseStructure'
import SetupTest from './plan/SetupTest'
import Film from './create/Film'
import Curriculum from './create/Curriculum'
import LandingPage from './publish/LandingPage'
import Pricing from './publish/Pricing'
import Promotion from './publish/Promotion'
import CourseMessage from './publish/CourseMessage'

export default {
    name: 'class-creation',
    components: {
        TargetStudent,
        CourseStructure,
        SetupTest,
        Film,
        Curriculum,
        LandingPage,
        Pricing,
        Promotion,
        CourseMessage
    },
    data() {
        return {
            selected: [],
            checkedItem: 'Course landing page',
            creations: [
                {
                    title: 'Plan your course',
                    body: ['Target your students', 'Course structure', 'Setup & test video'],
                },
                {
                    title: 'Create your content',
                    body: ['Film & edit', 'Curriculum'],
                },
                {
                    title: 'Publish your course',
                    body: ['Course landing page', 'Pricing', 'Promotions', 'Course messages'],
                },
            ],
            submit: false,
            course: {
                name1: null,
                email1: null,
                name2: null,
                email2: null,
                name3: null,
                email3: null,
                name4: null,
                email4: null,
                name5: null,
                email5: null,
                name6: null,
                email6: null,
                name7: null,
                email7: null,
                name8: null,
                email8: null,
                name9: null,
                email9: null,
            }
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
        },
        pickSelected($event) {
            this.checkedItem = $event.target.defaultValue
        }
    },
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
