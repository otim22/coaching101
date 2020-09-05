<template>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3>Subject introduction</h3>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12  mt-4">
                <div class="form-group">
                    <label for="subject_title">Subject title</label>
                    <div class="input-group">
                        <input type="text"
                                    class="form-control"
                                    id="subject_title"
                                    placeholder="Your subject title"
                                    aria-label="Your subject title"
                                    aria-describedby="subject_title"
                                    v-model="introduction.subject_title"
                                    name="introduction.subject_title">
                        <div class="input-group-append mb-2">
                                <span class="input-group-text" id="subject_title">50</span>
                          </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="subtitle">Subject sub-title</label>
                    <div class="input-group">
                        <input type="text"
                                    class="form-control"
                                    id="subject_subtitle"
                                    placeholder="Write your sub-title"
                                    aria-label="Write your sub-title"
                                    aria-describedby="subject_subtitle"
                                    v-model="introduction.subject_subtitle"
                                    name="introduction.subject_subtitle">
                        <div class="input-group-append mb-2">
                            <span class="input-group-text" id="subject_subtitle">100</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Subject description</label>
                    <textarea type="text"
                                class="form-control mb-2"
                                id="description"
                                rows="3"
                                placeholder="Description of the subject"
                                v-model="introduction.subject_description"
                                name="introduction.subject_description" />
                </div>
                <div class="form-group">
                    <label for="resource">Cover image</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file"
                                        class="custom-file-input"
                                        aria-describedby="custom-file-input"
                                        @change=""
                                        multiple
                                        tabindex="-1">
                            <label class="custom-file-label" for="select-file">
                                <p>No image added</p>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm btn-block btn-md mt-5">Save</button>

                    <!-- <div class="col-md-12">
                        <label for="category">Cover image</label>
                    </div> -->
                    <!-- <div class="form-group col-md-4">
                        <select id="selectSubject" v-model="introduction.default_subject"  class="form-control">
                            <option :selected="true">
                                        {{ introduction.default_subject }}
                            </option>
                            <option  v-for="subject_option in introduction.subject_options"
                                        :value="subject_option">
                                        {{ subject_option }}
                            </option>
                        </select>
                    </div> -->
                    <!-- <div class="form-group col-md-4">
                        <select id="selectClass" v-model="introduction.default_class" class="form-control">
                            <option  :selected="true">
                                        {{ introduction.default_class }}
                            </option>
                            <option v-for="class_option in introduction.class_options"
                                            :value="class_option">
                                            {{ class_option }}
                            </option>
                        </select>
                    </div> -->
                    <!-- <div class="form-group col-md-4">
                        <select id="selectLevel" v-model="introduction.default_level" class="form-control">
                            <option  :selected="true">
                                        {{ introduction.default_level }}
                            </option>
                            <option v-for="level_option in introduction.level_options"
                                            :value="level_option">
                                            {{ level_option }}
                            </option>
                        </select>
                    </div> -->
                  </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "subject-introduction",
    props: {
        introduction: Object,
    }
}
</script>
