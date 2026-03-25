<?php require APPROOT . '/views/partials/header.php'; ?>

<style>
    .contact-page {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
    }

    .contact-card {
        background: #15151d;
        border: 1px solid #242433;
        border-radius: 18px;
        padding: 30px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #33334a;
        background: #0f0f15;
        color: #fff;
    }

    textarea.form-control {
        min-height: 140px;
    }

    .btn-submit {
        padding: 12px 20px;
        border-radius: 10px;
        border: none;
        background: #fff;
        color: #111;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<div class="contact-page">
    <div class="contact-card">
        <h1>Contact Us</h1>
        <p style="color:#bdbdcc; margin:10px 0 25px;">Send us your message.</p>

        <form action="<?php echo URLROOT; ?>/contact/send" method="POST">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn-submit">Send Message</button>
        </form>
    </div>
</div>

<?php require APPROOT . '/views/partials/footer.php'; ?>