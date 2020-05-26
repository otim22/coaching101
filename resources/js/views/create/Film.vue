<template>
    <div>
        <h4>Film</h4>
        <p>
            <legend for="name4">Your Name 4:</legend>
            <input id="name4" name="name4" v-model="course.name4">
        </p>

        <p>
            <legend for="email4">Your Email 4:</legend>
            <input id="email4" name="email4" type="email4" v-model="course.email4">
        </p>
    </div>
</template>

<script>
export default {
    name: "film",
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
