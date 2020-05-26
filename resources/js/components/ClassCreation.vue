<template>
    <div class="container">
        <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3 mt-4">
                    <form action="/teacher-submission" method="post" enctype="multipart/form-data">
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
                            <button @click.prevent="submit()" type="button"class="btn btn-primary mt-5" name="button">Submit for review</button>
                        </div>
                    </form>
                </div>
            <div class="col-sm-12 col-md-9 col-lg-9 fast-transition mt-2">
                <div v-show="selected === 'tailorClass'">
                    <h4>Tailor Class</h4>
                    <p>
                        <legend for="name1">Your Name 1:</legend>
                        <input id="name1" type="text" name="name1" v-model="registration.name1">
                    </p>

                    <p>
                        <legend for="email1">Your Email 1:</legend>
                        <input id="email1" name="email1" type="email" v-model="registration.email1">
                    </p>
                </div>
                <div v-show="selected === 'courseStructure'">
                    <h4>Course Structure</h4>
                    <p>
                        <legend for="name2">Your Name 2:</legend>
                        <input id="name2" name="name2" v-model="registration.name2">
                    </p>

                    <p>
                        <legend for="email2">Your Email 2:</legend>
                        <input id="email2" name="email2" type="email2" v-model="registration.email2">
                    </p>
                </div>
                <div v-show="selected === 'setupTest'">
                    <h4>Setup Test</h4>
                    <p>
                        <legend for="name3">Your Name 3:</legend>
                        <input id="name3" name="name3" v-model="registration.name3">
                    </p>

                    <p>
                        <legend for="email3">Your Email 3:</legend>
                        <input id="email3" name="email3" type="email3" v-model="registration.email3">
                    </p>
                </div>
                <div v-show="selected === 'filmEdit'">
                    <h4>Film Edit</h4>
                    <p>
                        <legend for="name4">Your Name 4:</legend>
                        <input id="name4" name="name4" v-model="registration.name4">
                    </p>

                    <p>
                        <legend for="email4">Your Email 4:</legend>
                        <input id="email4" name="email4" type="email4" v-model="registration.email4">
                    </p>
                </div>
                <div v-show="selected === 'curriculum'">
                    <h4>Curriculum</h4>
                    <p>
                        <legend for="name5">Your Name 5:</legend>
                        <input id="name5" name="name5" v-model="registration.name5">
                    </p>

                    <p>
                        <legend for="email5">Your Email 5:</legend>
                        <input id="email5" name="email5" type="email5" v-model="registration.email5">
                    </p>
                </div>
                <div v-show="selected === 'landingPage'">
                    <h4>Landing Page</h4>
                    <p>
                        <legend for="name6">Your Name 6:</legend>
                        <input id="name6" name="name6" v-model="registration.name6">
                    </p>

                    <p>
                        <legend for="email6">Your Email 6:</legend>
                        <input id="email6" name="email6" type="email6" v-model="registration.email6">
                    </p>
                </div>
                <div v-show="selected === 'pricing'">
                    <h4>Pricing</h4>
                    <p>
                        <legend for="name7">Your Name 7:</legend>
                        <input id="name7" name="name7" v-model="registration.name7">
                    </p>

                    <p>
                        <legend for="email7">Your Email 7:</legend>
                        <input id="email7" name="email7" type="email7" v-model="registration.email7">
                    </p>
                </div>
                <div v-show="selected === 'promotions'">
                    <h4>Promotions</h4>
                    <p>
                        <legend for="name8">Your Name 8:</legend>
                        <input id="name8" name="name8" v-model="registration.name8">
                    </p>

                    <p>
                        <legend for="email8">Your Email 8:</legend>
                        <input id="email8" name="email8" type="email8" v-model="registration.email8">
                    </p>
                </div>
                <div v-show="selected === 'courseMessage'">
                    <h4>Course Message</h4>
                    <p>
                        <legend for="name9">Your Name 9:</legend>
                        <input id="name9" name="name9" v-model="registration.name9">
                    </p>

                    <p>
                        <legend for="email9">Your Email 9:</legend>
                        <input id="email9" name="email9" type="email9" v-model="registration.email9">
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
                Debug: {{ output }}
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                selected: 'tailorClass',
                output: '',
                registration: {
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
            submit() {
                let currentObj = this;
                axios.post('/teacher-submission', {
                    name1: this.registration.name1,
                    email1: this.registration.email1
                }).then(function (response) {
                    currentObj.output = response.data;
                }).catch(function (error) {
                    currentObj.output = error;
                });
                // alert('Submit to blah and show blah and etc.');
            }
        }
    }
</script>
