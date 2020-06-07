<template>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <h2>Course course page</h2>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 p-3">
                <div class="form-group">
                    <label for="course_title">Course title</label>
                    <div class="input-group">
                        <input type="text"
                                    class="form-control"
                                    id="course_title"
                                    placeholder="Your course title"
                                    aria-label="Your course title"
                                    aria-describedby="course_title"
                                    v-model="landing.course_title"
                                    name="course_title">
                        <div class="input-group-append">
                                <span class="input-group-text" id="course_title">50</span>
                          </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <div class="input-group">
                    <input type="text"
                                class="form-control"
                                id="course_subtitle"
                                placeholder="Write your subtitle"
                                aria-label="Write your subtitle"
                                aria-describedby="course_subtitle"
                                v-model="landing.course_subtitle"
                                name="course_subtitle">
                    <div class="input-group-append">
                            <span class="input-group-text" id="course_subtitle">150</span>
                      </div>
                </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text"
                                class="form-control"
                                id="description"
                                placeholder="Description of the course"
                                v-model="landing.course_description"
                                name="course_description">
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="category">Basic info</label>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="selectSubject" v-model="landing.default_subject"  class="form-control">
                            <option :selected="true">
                                        {{ landing.default_subject }}
                            </option>
                            <option  v-for="selectedSubject in landing.selected_subjects"
                                        :value="selectedSubject">
                                        {{ selectedSubject }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="selectClass" v-model="landing.default_class" class="form-control">
                            <option  :selected="true">
                                        {{ landing.default_class }}
                            </option>
                            <option v-for="selectedClass in landing.selected_classes"
                                            :value="selectedClass">
                                            {{ selectedClass }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="selectLevel" v-model="landing.default_level" class="form-control">
                            <option  :selected="true">
                                        {{ landing.default_level }}
                            </option>
                            <option v-for="selectedLevel in landing.selected_levels"
                                            :value="selectedLevel">
                                            {{ selectedLevel }}
                            </option>
                        </select>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group mt-5">
                    <h4>Instructor profile</h4>
                </div>
                <div class="mt-4">
                    <p for="subtitle">
                        <svg class="bi bi-person-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        </svg>
                        <span class="ml-2"> Otim fredrick</span>
                    </p>
                    <p> <a href="#">Update your profile</a></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "landing-page",
    props: {
        landing: { type: Object }
    },
}
</script>
