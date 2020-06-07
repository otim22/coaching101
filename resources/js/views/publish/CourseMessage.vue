<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <h2>Course Messages</h2>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 p-3">
                <p>Write messages to your students (optional) that will be sent automatically when they join or complete your course to encourage students to engage with course content. If you do not wish to send a welcome or congratulations message, leave the text box blank.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="welcomeMessage">Welcome Message</label>
                    <div class="input-group">
                        <textarea class="form-control" id="welcomeMessage" v-model="courseMessage.welcome_message" name="welcomeMessage" rows="3"></textarea>
                        <div class="input-group-append">
                            <span class="input-group-text">1000</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="congratulationsMessage">Congratulations Message</label>
                    <div class="input-group">
                        <textarea class="form-control" id="congratulationsMessage" v-model="courseMessage.congratulations_message" name="congratulationsMessage" rows="3"></textarea>
                        <div class="input-group-append">
                            <span class="input-group-text">1000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "course-message",
    props: {
        courseMessage: { type: Object }
    }
}
</script>
