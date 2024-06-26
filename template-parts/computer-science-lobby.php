<div class="cs-lobby-section">

    <section class="algorithm-section">
        <div class="container-heading">
            <h2>
                Algorithms
            </h2>
        </div>

        <div class="data-container">
            <?php
                // Define the menu names for each parent category
                $parent_menus = array(
                    'computer-science-algorithms-sorting',
                    'computer-science-algorithms-dynamic',
                    'computer-science-algorithms-graph',
                    'computer-science-algorithms-searching',
                    'computer-science-algorithms-greedy',
                    'computer-science-algorithms-divide-and-conquer'
                );

                // Loop through each parent menu
                foreach ($parent_menus as $parent_menu) {
                    // Get the menu items for the current parent category
                    $menu_items = wp_get_nav_menu_items($parent_menu);

                    // Loop through each menu item to find the parent category
                    foreach ($menu_items as $menu_item) {
                        // Check if the menu item is a parent category
                        if ($menu_item->menu_item_parent == 0) {
                            // Output the parent category name
                            echo '<div class="data-child"> 
                                    <h3>' . $menu_item->title . '</h3>
                                    <ul>';

                            // Loop through child categories
                            foreach ($menu_items as $child_menu_item) {
                                // Check if the child belongs to the current parent
                                if ($child_menu_item->menu_item_parent == $menu_item->ID) {
                                    // Output each child category as a list item
                                    echo '<li><a href="' . $child_menu_item->url . '">' . $child_menu_item->title . '</a></li>';
                                }
                            }

                            echo '</ul></div>';
                        }
                    }
                }
            ?>
        </div>
    </section>

    <section class="data-structure-section">
        <div class="container-heading">
            <h2>
                Data structures
            </h2>
        </div>
        <div class="data-container">
            <?php
                // Define the menu names for each parent category
                $parent_menus = array(
                    'computer-science-data-structures-linear',
                    'computer-science-data-structures-non-linear',
                    'computer-science-data-structures-hash',
                    'computer-science-data-structures-advanced',
                    'computer-science-data-structures-additional-topics',
                );

                // Loop through each parent menu
                foreach ($parent_menus as $parent_menu) {
                    // Get the menu items for the current parent category
                    $menu_items = wp_get_nav_menu_items($parent_menu);

                    // Loop through each menu item to find the parent category
                    foreach ($menu_items as $menu_item) {
                        // Check if the menu item is a parent category
                        if ($menu_item->menu_item_parent == 0) {
                            // Output the parent category name
                            echo '<div class="data-child"> 
                                    <h3>' . $menu_item->title . '</h3>
                                    <ul>';

                            // Loop through child categories
                            foreach ($menu_items as $child_menu_item) {
                                // Check if the child belongs to the current parent
                                if ($child_menu_item->menu_item_parent == $menu_item->ID) {
                                    // Output each child category as a list item
                                    echo '<li><a href="' . $child_menu_item->url . '">' . $child_menu_item->title . '</a></li>';
                                }
                            }

                            echo '</ul></div>';
                        }
                    }
                }
            ?>

        </div>
    </section>
</div>
