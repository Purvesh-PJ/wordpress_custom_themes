// Get references to search input and results container elements
const searchInput = document.getElementById('search-input');
const resultsContainer = document.getElementById('search-results');
const searchComponent = document.getElementById('search-component');
const ajaxurl = searchComponent.dataset.ajaxurl;

// Function to handle search term change
function handleSearch() {
  const searchTerm = searchInput.value.trim(); // Trim whitespace

  // Check if search term is empty
  if (!searchTerm) {
    // Clear previous results if the search term is empty
    resultsContainer.innerHTML = '';
    return; // Do nothing if no search term entered
  }

  // Create AJAX request
  const xhr = new XMLHttpRequest();
  xhr.open('POST', ajaxurl);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  // Send request with search term
  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);

      // Check if the response was successful
      if (response.success) {
        const results = response.data;
        console.log(results);

        // Process and display results
        displaySearchResults(results);
      } else {
        console.error('Error in search query:', response.data);
      }
    } else {
      console.error('Error fetching search results:', xhr.statusText);
    }
  };

  xhr.send('action=search_component_query&search_term=' + encodeURIComponent(searchTerm));
}


// Function to display search results
function displaySearchResults(results) {
  console.log('User searched for:', searchInput.value);
  // Clear previous results
  resultsContainer.innerHTML = '';

  // Iterate over all keys in the results object
  for (const sectionTitle in results) {
    if (results.hasOwnProperty(sectionTitle) && Array.isArray(results[sectionTitle]) && results[sectionTitle].length > 0) {
      displaySectionResults(results[sectionTitle], sectionTitle);
    }
  }

  // Function to display results for a specific section
  function displaySectionResults(sectionResults, sectionTitle) {
    // Create a container for the section
    const sectionContainer = document.createElement('div');
    sectionContainer.classList.add('search-section');

    // Create a container for h2
    const h2Container = document.createElement('div');
    h2Container.classList.add('h2-container');

    // Create a title for the section
    const sectionTitleElement = document.createElement('h2');
    sectionTitleElement.textContent = sectionTitle;
    h2Container.appendChild(sectionTitleElement);

    // Append h2 container to the section container
    sectionContainer.appendChild(h2Container);

    // Create a container for search-result
    const searchResultContainer = document.createElement('div');
    searchResultContainer.classList.add('search-result-container');

    // Loop through the results in the section
    sectionResults.forEach(function (result) {
      // Process and display each result
      const resultElement = document.createElement('div');
      resultElement.classList.add('search-result'); // Add a class for styling

      // Create a container for each result type
      const resultTypeContainer = document.createElement('div');
      resultTypeContainer.classList.add(result.type + '-container');

      // Check if result has a title
      if (result.hasOwnProperty('title')) {
        // Check if result type is not a category
        if (result.type !== 'category') {
          // Create a container for the image
          const imageContainer = document.createElement('div');
          imageContainer.classList.add('image-container');

          // Check if result has a thumbnail
          if (result.hasOwnProperty('thumbnail')) {
            const thumbnail = document.createElement('img');
            thumbnail.src = result.thumbnail;
            imageContainer.appendChild(thumbnail);
          }

          // Append the image container to the result type container
          resultTypeContainer.appendChild(imageContainer);
        }

        // Create a container for the title and excerpt
        const titleExcerptContainer = document.createElement('div');
        titleExcerptContainer.classList.add('title-excerpt-container');

        // Create a clickable title with a link
        const titleLink = document.createElement('a');
        if (result.type === 'category' && result.hasOwnProperty('permalink')) {
          titleLink.href = result.permalink;
        } else {
          titleLink.href = result.permalink;
        }

        // Highlight the title if it matches the search query
        const titleText = result.title;
        const searchTermIndexTitle = titleText.toLowerCase().indexOf(searchInput.value.toLowerCase());
        if (searchTermIndexTitle !== -1) {
          const snippetStartTitle = Math.max(0, searchTermIndexTitle);
          const snippetEndTitle = Math.min(titleText.length, searchTermIndexTitle + searchInput.value.length);
          const titleSnippet = titleText.substring(snippetStartTitle, snippetEndTitle);

          // Highlight individual occurrences of the search term in the title
          const highlightedTitle = titleText.replace(
            new RegExp(searchInput.value, 'gi'),
            match => `<span class="highlighted">${match}</span>`
          );

          // Set the highlighted title as HTML content
          titleLink.innerHTML = highlightedTitle;
        } else {
          // If search term not found in the title, simply set the title text
          titleLink.textContent = titleText;
        }

        // Append the title link to the title and excerpt container
        titleExcerptContainer.appendChild(titleLink);

        // Check if result type is not a category
        if (result.type !== 'category') {
          // Create and append a short excerpt containing the search query
          const shortExcerpt = document.createElement('p');
          let excerptContent = result.excerpt || ''; // Default to an empty string

          // Limit the excerpt length to a certain number of characters
          const maxExcerptLength = 100; // Adjust as needed
          if (excerptContent.length > maxExcerptLength) {
            excerptContent = excerptContent.substring(0, maxExcerptLength) + '...';
          }

          const searchTermIndex = excerptContent.toLowerCase().indexOf(searchInput.value.toLowerCase());

          if (searchTermIndex !== -1) {
            const snippetStart = Math.max(0, searchTermIndex - 20); // Adjust as needed
            const snippetEnd = Math.min(excerptContent.length, searchTermIndex + 50); // Adjust as needed
            const excerptSnippet = excerptContent.substring(snippetStart, snippetEnd);

            // Highlight individual occurrences of the search term
            const highlightedSnippet = excerptSnippet.replace(
              new RegExp(searchInput.value, 'gi'),
              match => `<span class="highlighted">${match}</span>`
            );

            // Set the highlighted snippet as HTML content
            shortExcerpt.innerHTML = `...${highlightedSnippet}...`;
          } else {
            // If search term not found, simply set the excerpt as HTML content
            shortExcerpt.innerHTML = `...${excerptContent}...`;
          }

          // Append the excerpt to the title and excerpt container
          titleExcerptContainer.appendChild(shortExcerpt);
        }

        // Append the title and excerpt container to the result type container
        resultTypeContainer.appendChild(titleExcerptContainer);
      }

      // Check if result has a description and type is not category
      if (result.hasOwnProperty('description') && result.type !== 'category') {
        const description = document.createElement('p');
        description.textContent = result.description;
        resultTypeContainer.appendChild(description);
      }

      // Append the result type container to the search-result container
      searchResultContainer.appendChild(resultTypeContainer);
    });

    // Append the search-result container to the section container
    sectionContainer.appendChild(searchResultContainer);

    // Append the section container to the main results container
    resultsContainer.appendChild(sectionContainer);
  }
}

// Attach event listener to search input
searchInput.addEventListener('keyup', handleSearch);

// Function to toggle the visibility of the search prompt
window.toggleSearchPrompt = function() {
  console.log('Toggle function executed'); // Add this line
  var searchQueryPrompt = document.getElementById('searchQueryPrompt');
  if (searchQueryPrompt) {
      if (searchQueryPrompt.style.display === 'none' || searchQueryPrompt.style.display === '') {
        searchQueryPrompt.style.display = 'block';
      } else {
        searchQueryPrompt.style.display = 'none';
      }
  }
}

// Function to close the search query prompt
window.closesearchQueryPrompt = function() {
  var searchQueryPrompt = document.getElementById('searchQueryPrompt');
  if (searchQueryPrompt) {
      searchQueryPrompt.style.display = 'none';
  }
}
