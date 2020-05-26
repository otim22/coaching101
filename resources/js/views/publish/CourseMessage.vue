<template>
    <div>
        <h4>Course Message</h4>
        <p>
            <legend for="name9">Your Name 9:</legend>
            <input id="name9" name="name9" v-model="course.name9">
        </p>

        <p>
            <legend for="email9">Your Email 9:</legend>
            <input id="email9" name="email9" type="email9" v-model="course.email9">
        </p>
    </div>
</template>

<script>
export default {
    name: "course-message",
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
