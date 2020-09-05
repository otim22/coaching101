<template>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3>Subject messages</h3>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 p-3">
                <p>Write messages to your students (optional) that will be sent automatically when they join or complete your subject to encourage students to engage with subject content. If you do not wish to send a welcome or congratulations message, leave the text box blank.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <label for="welcomeMessage">Welcome Message</label>
                    <div class="input-group">
                        <textarea class="form-control" id="welcomeMessage"
                                            v-model="subject_message.welcome_message"
                                            name="welcomeMessage"
                                            placeholder="Example: You are welcome to the subject"
                                            rows="3">
                        </textarea>
                        <div class="input-group-append">
                            <span class="input-group-text">1000</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="congratulationsMessage">Congratulations Message</label>
                    <div class="input-group">
                        <textarea class="form-control" id="congratulationsMessage"
                                        v-model="subject_message.congratulations_message"
                                        name="congratulationsMessage"
                                        placeholder="Example: Congragulations for completing the subject"
                                        rows="3">
                        </textarea>
                        <div class="input-group-append">
                            <span class="input-group-text">1000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 mt-4 mb-4">
                <button class="btn btn-primary btn-block btn-sm">
                    Save
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "subject-message",
    props: {
        subject_message: {
            type: Object
        }
    }
}
</script>
