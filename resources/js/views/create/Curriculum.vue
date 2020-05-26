<template>
    <div>
        <h4>Curriculum</h4>
        <p>
            <legend for="name5">Your Name 5:</legend>
            <input id="name5" name="name5" v-model="course.name5">
        </p>

        <p>
            <legend for="email5">Your Email 5:</legend>
            <input id="email5" name="email5" type="email5" v-model="course.email5">
        </p>
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
    }
}
</script>

<style lang="scss" scoped>
</style>
