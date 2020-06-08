<template>
    <div class="container p-4">
        <div class="row mb-4">
            <div class="cols-sm-12 col-md-12 col-lg-12">
                <h2>Target your students</h2> <hr />
                <p class="lead mb-4 mt-4">The descriptions you write here will help students decide if your class is the one for them.</p>
            </div>
            <div class="cols-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="students_learn">What will students learn in your class?</label>
                    <input v-for="elem in students_learn" :key="elem.key" type="email"
                                ref="students_learn"
                                class="form-control form-control-sm mb-2"
                                :id="elem.key"
                                v-model="elem.students_learn"
                                name="students_learn">
                </div>
            </div>
            <div class="cols-sm-12 col-md-12 col-lg-12">
                <button @click="addStudentsLearnInput">
                    <span class="mr-1">
                        <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    Add answer
                </button>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="class_requirement">Are there any class requirements or prerequisites?</label>
                    <input v-for="elem in class_requirement" :key="elem.key" type="email"
                                ref="class_requirement"
                                class="form-control form-control-sm mb-2"
                                :id="elem.key"
                                v-model="elem.class_requirement"
                                name="class_requirement">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <button @click="addClassRequirementInput">
                    <span class="mr-1">
                        <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    Add answer
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="target_students">Who are your target students?</label>
                    <input v-for="elem in target_students" :key="elem.key" type="email"
                                ref="target_students"
                                class="form-control form-control-sm mb-2"
                                :id="elem.key"
                                v-model="elem.target_student"
                                name="target_students">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <button @click="addTargetStudentsInput">
                    <span class="mr-1">
                        <svg class="bi bi-plus-circle" width="1.3em" height="1.3em" viewBox="0 0 16 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        </svg>
                    </span>
                    Add answer
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "target-student",
    computed: {
        students_learn() {
            return this.$store.state.course.students_learn
        },
        class_requirement() {
            return this.$store.state.course.class_requirement
        },
        target_students() {
            return this.$store.state.course.target_students
        }
    },
    methods: {
        addStudentsLearnInput() {
            this.students_learn.push({
                students_learn: null
            })
        },
        addClassRequirementInput () {
            this.class_requirement.push({
                class_requirement: null
            })
        },
        addTargetStudentsInput () {
            this.target_students.push({
                target_student: null
            })
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
