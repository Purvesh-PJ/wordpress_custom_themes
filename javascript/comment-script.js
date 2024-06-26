function openCommentPrompt() {
    const containerId = document.getElementById('cmt-1');
    if(containerId){
        containerId.style.display = 'block';
    }
}

function closeComnmentPrompt() {
    const containerId = document.getElementById('cmt-1');
    if(containerId){
        containerId.style.display = 'none';
    }
}