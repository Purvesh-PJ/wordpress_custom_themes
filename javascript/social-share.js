// social-share.js

function openSharePrompt(postUrl) {
    // Create the sharePrompt element if it doesn't exist
    var sharePrompt = document.getElementById('sharePrompt');
    if (!sharePrompt) {
        sharePrompt = document.createElement('div');
        sharePrompt.id = 'sharePrompt';
        sharePrompt.style.position = 'fixed';
        sharePrompt.style.top = '50%';
        sharePrompt.style.left = '50%';
        sharePrompt.style.transform = 'translate(-50%, -50%)';
        sharePrompt.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
        sharePrompt.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.1)';
        sharePrompt.style.zIndex = '9999';
        sharePrompt.style.display = 'none'; 
        sharePrompt.style.borderRadius = '10px';
        sharePrompt.style.backdropFilter = 'blur(10px)';
        
        // Add content to the prompt
        sharePrompt.innerHTML = `
            <div class="share-prompt-container">
                <div class="share-close-buttom-container">
                    <h2 class="share-title">Share</h2>
                    <span onclick="closeSharePrompt()" class="material-icons">clear</span>
                </div>
                <div class="share-url-container">
                    <input type="text" id="shareUrlInput" readonly>
                    <div class="copy-icon-container">
                        <span onclick="copyShareUrl()" class="material-icons copy">content_copy</span>
                    </div>
                </div>
                <div class="share-options">
                    <a href="#" class="share-option" onclick="shareOnFacebook()"> <i class="fab fa-facebook"></i></a>
                    <a href="#" class="share-option" onclick="shareOnTwitter()" > <i class="fab fa-quora"></i></a>
                    <a href="#" class="share-option" onclick="shareOnWhatsApp()"> <i class="fab fa-whatsapp"></i></a>
                    <a href="#" class="share-option" onclick="shareOnQuora()"   > <i class="fab fa-twitter"></i></i></a>
                    <!-- Add more social media options as needed -->
                </div>
            </div>
        `;

        document.body.appendChild(sharePrompt);
    }

    // Update the style of sharePrompt
    sharePrompt.style.display = 'block';

    // Set the post URL in the input field
    var shareUrlInput = document.getElementById('shareUrlInput');
    if (shareUrlInput) {
        console.log("post_data.post_url:", post_data.post_url);
        shareUrlInput.value = postUrl;
    }
}

function closeSharePrompt() {
    var sharePrompt = document.getElementById('sharePrompt');
    if (sharePrompt) {
        sharePrompt.style.display = 'none';
    }
}

function shareOnFacebook() {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(post_data.post_url), '_blank');
}

function shareOnTwitter() {
    window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(post_data.post_url), '_blank');
}

function copyShareUrl() {
    var shareUrlInput = document.getElementById('shareUrlInput');
    shareUrlInput.select();
    document.execCommand('copy');
    alert('URL copied!');
}

function shareOnWhatsApp() {
    var postUrl = encodeURIComponent(post_data.post_url);
    var whatsappUrl = `https://api.whatsapp.com/send?text=${postUrl}`;
    window.open(whatsappUrl, '_blank');
}

function shareOnQuora() {
    var postTitle = encodeURIComponent(post_data.post_title);
    var postUrl = encodeURIComponent(post_data.post_url);
    var quoraUrl = `https://www.quora.com/compose?title=${postTitle}&url=${postUrl}`;
    window.open(quoraUrl, '_blank');
}

