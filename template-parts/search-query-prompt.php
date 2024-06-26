
<div id="searchQueryPrompt" class="search-prompt-container" >
    <div class="close-button-container">
        <i class="fas fa-search"></i>
            <!-- <h2 class="share-title">Search</h2> -->
            <input type="text" id="search-input" placeholder="Search..." autocomplete="off">
        <span onclick="closesearchQueryPrompt()" class="material-icons">clear</span>
    </div>
    <div id="search-component" data-ajaxurl="<?php echo admin_url('admin-ajax.php'); ?>">
        
        <!-- <hr class="divider"/> -->
        <div id="search-results" class="search-results-container"></div>
    </div>
</div>