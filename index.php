<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Library-System</title>
    <link rel="stylesheet" href="style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet" />
</head>

<body>
    <header id="top-header">
        <h1>CSCI 4410 Library System</h1>
    </header>
    
    <a href="logout.php">Logout</a>

    <div id="book-total">
        <p id="book-count">0</p>
        <span id="book-label">Books in Library</span>
    </div>

    <!-- Container To Hold All Books -->
    <div id="all-books"></div>

    <h2 style="color: white">Quick Add Book</h2>
    <div id="add-book-ISBN">
        <div class="field full">
            <label for="quick-isbn-input">ISBN</label>
            <input id="quick-isbn-input" type="text" placeholder="Enter ISBN" />
        </div>

        <div class="field full">
            <label for="rating-input-ISBN">Rating</label>
            <div id="rating-input-ISBN" class="star-rating">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
            </div>
            <input type="hidden" id="rating-value-ISBN" value="0" />
        </div>

        <button id="quick-add-btn">Add</button>
    </div>

    <h2 style="color: white">Manually Add Book</h2>
    <div id="add-books">
        <div class="field">
            <label for="title-input">Title</label>
            <input id="title-input" type="text" placeholder="Enter title" />
        </div>

        <div class="field">
            <label for="author-input">Author</label>
            <input id="author-input" type="text" placeholder="Enter author" />
        </div>

        <div class="field full">
            <label for="manual-isbn-input">ISBN</label>
            <input id="manual-isbn-input" type="text" placeholder="Enter ISBN" />
        </div>

        <div class="field full">
            <label for="genre-input">Genre</label>
            <input id="genre-input" type="text" placeholder="e.g. Fantasy, Sci-Fi" />
        </div>

        <div class="field full">
            <label for="rating-input">Rating</label>
            <div id="rating-input" class="star-rating">
                <span class="star" data-value="1">★</span>
                <span class="star" data-value="2">★</span>
                <span class="star" data-value="3">★</span>
                <span class="star" data-value="4">★</span>
                <span class="star" data-value="5">★</span>
            </div>
            <input type="hidden" id="rating-value" value="0" />
        </div>

        <div class="field full">
            <label for="description-area">Description</label>
            <textarea id="description-area" placeholder="Write a short description..."></textarea>
        </div>

        <button id="manual-add-btn">Add</button>
    </div>

    <h2 style="color: white">🔍 Search For A Book</h2>
    <div id="search-books">
        <div class="field">
            <label for="search-title">Title</label>
            <input id="search-title" type="text" placeholder="Search by title" />
        </div>

        <div class="field">
            <label for="search-author">Author</label>
            <input id="search-author" type="text" placeholder="Search by author" />
        </div>

        <div class="field full">
            <label for="search-isbn">ISBN</label>
            <input id="search-isbn" type="text" placeholder="Enter ISBN" />
        </div>

        <div class="field full">
            <label for="search-genre">Genre</label>
            <input id="search-genre" type="text" placeholder="Search by genre" />
        </div>

        <button id="search-btn">Search</button>
    </div>

    <script src="script.js"></script>
</body>

</html>