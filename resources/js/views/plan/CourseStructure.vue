<template>
    <div>
        <h4>Course Structure</h4>
        <p>
            <legend for="name2">Your Name 2:</legend>
            <input id="name2" type="text" name="name2" v-model="course.name2">
        </p>

        <p>
            <legend for="email2">Your Email 2:</legend>
            <input id="email2" name="email2" type="email" v-model="course.email2">
        </p>
    </div>
</template>

<script>
export default {
    name: "course-structure",
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
