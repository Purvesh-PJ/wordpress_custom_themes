function openHamburgerPrompt() {
    // Create the HamburgerPrompt element if it doesn't exist
    var HamburgerPrompt = document.getElementById('HamburgerPrompt');

    if (!HamburgerPrompt) {
        HamburgerPrompt = document.createElement('div');
        HamburgerPrompt.id = 'HamburgerPrompt';
        HamburgerPrompt.style.position = 'fixed';
        HamburgerPrompt.style.top = '50%';
        HamburgerPrompt.style.left = '50%';
        HamburgerPrompt.style.transform = 'translate(-50%, -50%)';
        HamburgerPrompt.style.backgroundColor = 'white';
        HamburgerPrompt.style.padding = '10px';
        HamburgerPrompt.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.1)';
        HamburgerPrompt.style.zIndex = '9999';
        HamburgerPrompt.style.display = 'none';
        HamburgerPrompt.style.borderRadius = '5px';
        HamburgerPrompt.style.width = '250px';

        // Add content to the prompt
        HamburgerPrompt.innerHTML = `
            <div class="ham-prompt-container">
                <div class="ham-close-buttom-container">
                    <span onclick="closeHamburgerPrompt()" class="material-icons clear-icon">clear</span>
                </div>
               
                <nav class="navigation-links">
                    <ul>
                        <li ${document.body.classList.contains('home') ? 'class="current-menu-item"' : ''}>
                            <a href="<?php echo home_url(); ?>">Home</a>
                        </li>
                        <li ${document.body.classList.contains('privacy-policy') ? 'class="current-menu-item"' : ''}>
                            <a href="<?php echo home_url('/pages/privacy-policy'); ?>">Privacy Policy</a>
                        </li>
                        <li ${document.body.classList.contains('contact-us') ? 'class="current-menu-item"' : ''}>
                            <a href="<?php echo home_url('/contact-us'); ?>">Contact Us</a>
                        </li>
                        <li ${document.body.classList.contains('services') ? 'class="current-menu-item"' : ''}>
                            <a href="<?php echo home_url('/services'); ?>">Services</a>
                        </li>
                    </ul>
                </nav>
            </div>
        `;
        document.body.appendChild(HamburgerPrompt);
    }

    // Update the style of HamburgerPrompt
    HamburgerPrompt.style.display = 'block';
}

function closeHamburgerPrompt() {
    var HamburgerPrompt = document.getElementById('HamburgerPrompt');
    if (HamburgerPrompt) {
        HamburgerPrompt.style.display = 'none';
    }
}

