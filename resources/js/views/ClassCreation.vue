<template>
    <div class="container">
        <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
                    <form @keyup.enter="createCourse">
                        <div class="mb-4">
                            <h5 class="side-font mb-3">Plan your course</h5>
                            <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="tailorClass" id="tailorClass" value="tailorClass" v-model="selected">
                                    <a href="#">
                                        <label class="form-check-label" for="tailorClass">
                                                Introduction
                                        </label>
                                    </a>
                            </div>
                            <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="courseStructure" id="courseStructure" value="courseStructure"
                                    v-model="selected">
                                    <a href="#">
                                    <label class="form-check-label" for="courseStructure">
                                            Course structure
                                    </label>
                                </a>
                            </div>
                            <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="setupTest" id="setupTest" value="setupTest" v-model="selected">
                                    <a href="#">
                                        <label class="form-check-label" for="setupTest">
                                                Setup & test video
                                        </label>
                                </a>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h5 class="side-font mb-3">Create your content</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="filmEdit" id="filmEdit" value="filmEdit" v-model="selected">
                                <a href="#">
                                    <label class="form-check-label" for="filmEdit">
                                        Film & edit
                                    </label>
                                </a>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="curriculum" value="curriculum" v-model="selected">
                                <a href="#">
                                    <label class="form-check-label" for="curriculum">
                                        Curriculum
                                    </label>
                                </a>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h5 class="side-font mb-3">Publish your course</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="landingPage" id="landingPage" value="landingPage" v-model="selected">
                                <a href="#">
                                    <label class="form-check-label" for="landingPage">
                                        Course landing page
                                    </label>
                                </a>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="pricing" id="pricing" value="pricing" v-model="selected">
                                <a href="#">
                                    <label class="form-check-label" for="pricing">
                                        Pricing
                                    </label>
                                </a>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" id="promotions" value="promotions" v-model="selected">
                                <a href="#">
                                    <label class="form-check-label" for="promotions">
                                        Promotions
                                    </label>
                                </a>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="courseMessage" id="courseMessage" value="courseMessage" v-model="selected">
                                <a href="#">
                                    <label class="form-check-label" for="courseMessage">
                                        Course messages
                                    </label>
                                </a>
                            </div>
                            <button @click.prevent="createCourse" type="submit" class="btn btn-primary mt-5">Submit for review</button>
                        </div>
                    </form>
                </div>
            <div class="col-sm-12 col-md-9 col-lg-9 fast-transition mt-2">
                <Introduction v-show="selected === 'tailorClass'" :course="course" />
                <CourseStructure  v-show="selected === 'courseStructure'" :course="course" />
                <SetupTest v-show="selected === 'setupTest'" :course="course"  />
                <Film v-show="selected === 'filmEdit'" :course="course"  />
                <Curriculum v-show="selected === 'curriculum'" :course="course"  />
                <LandingPage v-show="selected === 'landingPage'" :course="course"  />
                <Pricing v-show="selected === 'pricing'" :course="course"  />
                <Promotion v-show="selected === 'promotions'" :course="course"  />
                <CourseMessage v-show="selected === 'courseMessage'" :course="course"  />
            </div>
        </div>
    </div>
</template>

<script>
import Introduction from './plan/Introduction'
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
        Introduction,
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
            selected: 'tailorClass',
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
                    console.log('success', this.course)
                })
                .catch(err => {
                    this.submit = false
                })
        }
    }
}
</script>
