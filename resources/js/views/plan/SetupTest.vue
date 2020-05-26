<template>
    <div>
        <h4>Setup Test</h4>
        <p>
            <legend for="name3">Your Name 3:</legend>
            <input id="name3" name="name3" v-model="course.name3">
        </p>

        <p>
            <legend for="email3">Your Email 3:</legend>
            <input id="email3" name="email3" type="email3" v-model="course.email3">
        </p>
    </div>
</template>

<script>
export default {
    name: "setup-test",
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
