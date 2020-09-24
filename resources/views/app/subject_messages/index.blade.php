<div class="fast-transition mt-2 mb-3">
    <div class="row m-2 pt-2">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3>Subject messages</h3>
            <hr />
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <p>Write messages to your students (optional) that will be sent automatically when they join or complete your subject to encourage students to engage with subject content. If you do not wish to send a welcome or congratulations message, leave the text box blank.</p>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
            <form action="{{ url('message_submission') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="welcome_message">Welcome Message</label>
                    <div class="input-group">
                        <textarea class="form-control @error('welcome_message') is-invalid @enderror"
                                            name="welcome_message"
                                            placeholder="Example: You are welcome to the subject"
                                            rows="3" required>
                        </textarea>
                    </div>
                    @error('welcome_message')
                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="congragulation_message">Congratulations Message</label>
                    <div class="input-group">
                        <textarea class="form-control @error('congragulation_message') is-invalid @enderror"
                                        name="congragulation_message"
                                        placeholder="Example: Congragulations for completing the subject"
                                        rows="3" required>
                        </textarea>
                    </div>
                    @error('congragulation_message')
                        <div class="alert alert-danger p-2 mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4"> Save </button>
            </form>
        </div>
    </div>
</div>
