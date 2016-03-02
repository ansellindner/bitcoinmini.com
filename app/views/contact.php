<div class="row subtitle">
	<h2>Contact Us</h2>
</div>

<div class="container" style="padding:30px 10%;">

    <form class="" action="<?=HOME_PATH;?>/contactForm" method="POST" data-toggle="validator">

        <div class="form-group">
            <label for="contact_name">Name</label>
            <input type="text" name="contact_name" class="form-control" id="contact_name" placeholder="Satoshi Nakamoto" required>
        </div>
        <div class="form-group">
            <label for="contact_email">Email</label>
            <input type="email" name="contact_email" class="form-control" id="contact_email" placeholder="me@example.com" required>
        </div>
        <div class="form-group">
            <label for="contact_msg">Message</label>
            <textarea name="contact_msg" id="contact_msg" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group row">
            <div class="col-xs-8 text-left">
                <button type="submit" class="btn node-btn2">Send</button>
            </div>
    		<div class="col-xs-4 text-right">
                <a href="cancel" class="btn node-btn cancel">cancel</a>
            </div>
        </div>

    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#mynavbar').addClass('blue-header');
    });
</script>
