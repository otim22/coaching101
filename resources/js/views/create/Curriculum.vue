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
        <div v-for="(line, index) in lines" :key="index" class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                <div class="card card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                                    class="form-control"
                                    id="title"
                                    placeholder="Your content title"
                                    aria-label="Your content title"
                                    aria-describedby="title"
                                    v-model="line.content_title">
                    </div>
                    <div class="form-group">
                        <label for="title">Content</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="contentFilesId">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file"
                                            class="custom-file-input"
                                            id="contentFiles"
                                            ref="mainContentFiles"
                                            aria-describedby="contentFilesId"
                                            @change="uploadMainContent()">
                                <label class="custom-file-label" for="contentFiles">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"
                                    class="form-control"
                                    id="description"
                                    placeholder="Include a description. What students will be able to do after completing the class."
                                    aria-label="Add a description"
                                    aria-describedby="description"
                                    v-model="line.content_description">
                    </div>
                    <div class="form-group">
                        <label for="resource">Resource</label>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file"
                                            class="custom-file-input"
                                            id="select-file"
                                            ref="extraResourceFiles"
                                            aria-describedby="select-file"
                                            @change="uploadExtraResource()">
                                <label class="custom-file-label" for="select-file">No file selected</label>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">
                                <strong>Note:</strong>  A resource is for any type of document that can be used to help students in the class. This file is going to be more like an extra class. Make sure everything the file size is less than 500 MB.
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4">
                <button v-if="index + 1 === lines.length" @click="addLine" class="mr-4">
                    <span class="mr-2">
                        <svg class="bi bi-plus-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    Add section
                </button>
                <button  @click="removeLine(index)">
                    <span class="mr-2">
                        <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </span>
                    Remove section
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "curriculum",
    props: {
        course: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            lines: [],
            blockRemoval: true,
            mainContentFiles: '',
            extraResourceFiles: ''
        }
    },
    mounted () {
        this.addLine()
    },
    methods: {
        uploadMainContent() {
            this.mainContentFiles = this.$refs.mainContentFiles.files[0];
        },
        uploadExtraResource() {
            this.extraResourceFiles = this.$refs.extraResourceFiles.files[0];
        },
        addLine () {
            let checkEmptyLines = this.lines.filter(line => line.number === null)

            if (checkEmptyLines.length >= 1 && this.lines.length > 0) {
                return
            }

            this.lines.push({
                content_title: null,
                main_content_files: null,
                content_description: null,
                extra_resource_files: null
            })
        },
        removeLine (lineId) {
            if (!this.blockRemoval) {
                this.lines.splice(lineId, 1)
            }
        }
    },
    watch: {
        lines () {
          this.blockRemoval = this.lines.length <= 1
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
