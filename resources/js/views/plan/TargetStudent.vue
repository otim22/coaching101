<template>
    <div class="container p-4">
        <div class="mb-4">
            <h2>Target your students</h2>
            <hr />
            <p class="lead mb-4">The descriptions you write here will help students decide if your class is the one for them.</p>
            <div class="form-group">
                <label for="students_learn">What will students learn in your class?</label>
                <input type="email" class="form-control form-control-sm" id="students_learn" v-model="course.students_learn" name="students_learn">
            </div>
            <button class="btn btn-sm btn-secondary mt-2">Add an answer</button>
        </div>
        <div class="mb-4">
            <div class="form-group">
                <label for="class_requirement">Are there any class requirements or prerequisites?</label>
                <input type="email" class="form-control form-control-sm" id="class_requirement" v-model="course.class_requirement" name="class_requirement">
            </div>
            <button class="btn btn-sm btn-secondary mt-2">Add an answer</button>
        </div>
        <div>
            <div class="form-group">
                <label for="target_students">Who are your target students?</label>
                <input type="email" class="form-control form-control-sm" id="target_students" v-model="course.target_students" name="target_students">
            </div>
            <button class="btn btn-sm btn-secondary mt-2">Add an answer</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "target-student",
    props: {
        course: {
            type: Object,
            required: true
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
