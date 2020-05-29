<template>
    <div class="container p-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <h2>Course landing page</h2>
                <hr />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 p-3">
                <div class="form-group">
                    <label for="title">Course title</label>
                    <input type="text" class="form-control" id="title" placeholder="Your course title">
                </div>
                <div class="form-group">
                    <label for="subtitle">Subtitle</label>
                    <input type="text" class="form-control" id="subtitle" placeholder="Write your subtitle">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Description of the course">
                </div>
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="category">Basic info</label>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="category" class="form-control">
                            <option selected>-- Subject --</option>
                            <option>Mathematics</option>
                            <option>Science</option>
                            <option>Languages</option>
                            <option>Social sciences</option>
                            <option>Vocational subjects</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="category" class="form-control">
                            <option selected>-- Class --</option>
                            <option>Senior one</option>
                            <option>Senior two</option>
                            <option>Senior three</option>
                            <option>Senior four</option>
                            <option>Senior five</option>
                            <option>Senior six</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <select id="category" class="form-control">
                            <option selected>-- Term --</option>
                            <option>One</option>
                            <option>Two</option>
                            <option>Three</option>
                        </select>
                    </div>
                  </div>
                <div class="form-group mt-4">
                    <h5>Instructor profile(s)</h5>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p for="subtitle">
                    <svg class="bi bi-person-circle" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                    <span class="ml-2"> Otim fredrick</span>
                </p>
                <p> <a href="#">Update your profile</a></p>
            </div>
        </div>
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
