<form class="contact-form" action="process-contact.php" method="post">
    <!-- Add your form fields here -->
    <label  for="name">Your name</label>
    <input class="form-input"  type="text" id="name" name="name" required>

    <label  for="email">Your email</label>
    <input class="form-input"  type="email" id="email" name="email" required>

    <label  for="message">Your message</label>
    <textarea class="form-input"  id="message" name="message" rows="4" required></textarea>

    <button type="submit">Submit</button>
</form>