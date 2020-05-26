<template>
    <div>
        <h4>Promotion</h4>
        <p>
            <legend for="name8">Your Name 8:</legend>
            <input id="name8" name="name8" v-model="course.name8">
        </p>

        <p>
            <legend for="email8">Your Email 8:</legend>
            <input id="email8" name="email8" type="email8" v-model="course.email8">
        </p>
    </div>
</template>

<script>
export default {
    name: "promotion",
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
