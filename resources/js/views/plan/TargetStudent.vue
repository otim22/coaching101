<template>
    <div>
        <h4>Introduction</h4>
        <p>
            <legend for="name1">Your Name 1:</legend>
            <input id="name1" type="text" name="name1" v-model="course.name1">
        </p>

        <p>
            <legend for="email1">Your Email 1:</legend>
            <input id="email1" name="email1" type="email" v-model="course.email1">
        </p>
    </div>
</template>

<script>
export default {
    name: "introduction",
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
