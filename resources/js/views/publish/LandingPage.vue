<template>
    <div>
        <h4>Landing Page</h4>
        <p>
            <legend for="name6">Your Name 6:</legend>
            <input id="name6" name="name6" v-model="course.name6">
        </p>

        <p>
            <legend for="email6">Your Email 6:</legend>
            <input id="email6" name="email6" type="email6" v-model="course.email6">
        </p>
    </div>
</template>

<script>
export default {
    name: "landing-page",
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
