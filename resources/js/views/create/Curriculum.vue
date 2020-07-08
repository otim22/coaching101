<template>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <h2>Curriculum</h2>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p>
                    Start putting together your course by creating sections, lectures and practice (quizzes, coding exercises and assignments).
                    If you’re intending to offer your course for free, the total length of video content must be less than 2 hours.
                </p>
            </div>
        </div>
        <div v-for="(curriculum, index) in curriculums" :key="index" class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                <div class="card card-body">
                    <div class="form-group">
                        <div class="float-right">
                            <button class class="btn btn-secondary btn-sm" @click="removeCurriculum(index)">
                                <span class="mr-1">
                                    <svg class="bi bi-trash" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </span>
                                Remove section
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content_title">Content title</label>
                        <input type="text"
                                    class="form-control"
                                    id="content_title"
                                    placeholder="Your content title"
                                    aria-label="Your content title"
                                    aria-describedby="content_title"
                                    v-model="curriculum.content_title"
                                    name="content_title">
                    </div>
                    <div class="form-group">
                        <label for="title">Content files</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file"
                                            class="custom-file-input"
                                            :ref="'main_content_files ' + index"
                                            aria-describedby="main_content_files"
                                            @change="uploadMainContent(index)"
                                            tabindex="-1">
                                <label class="custom-file-label" for="contentFiles">
                                    {{ curriculum.main_content_files.length > 0 ? curriculum.main_content_files[index] : 'No file added'  }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="content_description">Content description</label>
                        <textarea type="text"
                                    rows="3"
                                    class="form-control"
                                    id="content_description"
                                    placeholder="Include a description. What students will be able to do after completing the class."
                                    v-model="curriculum.content_description"/>
                    </div>
                    <div class="form-group">
                        <label for="resource">Resource attachments</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file"
                                            class="custom-file-input"
                                            aria-describedby="extra_resource_files"
                                            @change="uploadExtraResource(index)"
                                            tabindex="-1">
                                <label class="custom-file-label" for="select-file">
                                    {{ curriculum.extra_resource_files.length > 0 ? curriculum.extra_resource_files[index] : 'No file added'  }}
                                </label>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">
                                <strong>Note:</strong>  A resource is for any type of document that can be used to help students in the class. This file is going to be more like an extra class. Make sure everything the file size is less than 500 MB.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                <button v-if="index + 1 === curriculums.length" @click="addCurriculum">
                    <span class="mr-1">
                        <svg class="bi bi-plus-circle" width="1.4em" height="1.4em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    Add section
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "curriculum",
    props: {
        curriculums: {
            type: Array
        }
    },
    data() {
        return {
            blockRemoval: true,
            blockaddition: false,
        }
    },
    methods: {
        uploadMainContent(index) {
            return this.$set(this.curriculums[0].main_content_files, index, event.target.files[0].name);
        },
        uploadExtraResource(index) {
            return this.$set(this.curriculums[0].extra_resource_files, index, event.target.files[0].name);
        },
        addCurriculum () {
            this.curriculums.push({
                content_title: null,
                main_content_files: [],
                content_description: null,
                extra_resource_files: []
            })
        },
        removeCurriculum(index) {
            if (!this.blockRemoval) {
                this.curriculums.splice(index, 1)
            }
        }
    },
    watch: {
        'curriculums': {
            handler(val, oldVal) {
                if (val !== oldVal) this.blockaddition = true
                console.log(val, oldVal);
            },
            immediate: true,
            deep: true,
        }
    }
}
</script>

<style lang="scss" scoped>
    .mydivouter {
    	position: relative;
    	background: #e6e6e6;
        width: 3px;
        height: 100px;
        margin: 0 auto;
    }
    .mydivoverlap{
        position: relative;
        z-index: 1;
    }
    .mybuttonoverlap {
    	position: absolute;
        z-index: 2;
        top: 30px;
        display: none;
        left: 16px;
    }
    .mydivouter:hover .mybuttonoverlap {
    	display:block;
    }
</style>
