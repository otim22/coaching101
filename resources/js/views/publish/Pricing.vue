<template>
    <div>
        <h4>Pricing</h4>
        <p>
            <legend for="name7">Your Name 7:</legend>
            <input id="name7" name="name7" v-model="course.name7">
        </p>

        <p>
            <legend for="email7">Your Email 7:</legend>
            <input id="email7" name="email7" type="email7" v-model="course.email7">
        </p>
    </div>
</template>

<script>
export default {
    name: "pricing",
    props: {
        course: { type: Object }
    }
}
</script>

<style lang="scss" scoped>
</style>
