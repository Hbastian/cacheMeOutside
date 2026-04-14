const manualAddBtn = document.getElementById("manual-add-btn");
const quickAddBtn = document.getElementById("quick-add-btn");
const allBooks = document.getElementById("all-books");
const bookCount = document.getElementById("book-count");

function updateBookCount() {
    const totalBooks = allBooks.querySelectorAll(".book-card").length;
    bookCount.textContent = totalBooks;
}

function resetStarRating(hiddenInputId, ratingContainerId) {
    const hiddenInput = document.getElementById(hiddenInputId);
    const ratingContainer = document.getElementById(ratingContainerId);

    hiddenInput.value = "0";

    ratingContainer.querySelectorAll(".star").forEach((star) => {
        star.classList.remove("active");
    });
}

function createBookCard({ title, author, isbn, genre, description, rating }) {
    const filledStars = "★".repeat(rating);
    const emptyStars = "☆".repeat(5 - rating);

    const bookCard = document.createElement("div");
    bookCard.classList.add("book-card");

    bookCard.innerHTML = `
        <div class="book">
            <h3 class="book-title">${title}</h3>
            <p class="book-author"><strong>Author:</strong> ${author}</p>
            <p class="book-isbn"><strong>ISBN:</strong> ${isbn}</p>
            <p class="book-genre"><strong>Genre:</strong> ${genre}</p>
            <p class="book-rating"><strong>Rating:</strong> ${filledStars}${emptyStars}</p>
            <p class="book-description"><strong>Description:</strong> ${description}</p>
        </div>
    `;

    allBooks.appendChild(bookCard);
    updateBookCount();
}

// Manual Add
manualAddBtn.addEventListener("click", () => {
    const title = document.getElementById("title-input").value.trim();
    const author = document.getElementById("author-input").value.trim();
    const isbn = document.getElementById("manual-isbn-input").value.trim();
    const genre = document.getElementById("genre-input").value.trim();
    const description = document.getElementById("description-area").value.trim();
    const rating = parseInt(document.getElementById("rating-value").value, 10);

    if (!title || !author || !isbn || !genre || !description) {
        alert("Please fill in all manual book fields.");
        return;
    }

    if (rating === 0) {
        alert("Please select a star rating.");
        return;
    }

    createBookCard({
        title,
        author,
        isbn,
        genre,
        description,
        rating
    });

    document.getElementById("title-input").value = "";
    document.getElementById("author-input").value = "";
    document.getElementById("manual-isbn-input").value = "";
    document.getElementById("genre-input").value = "";
    document.getElementById("description-area").value = "";

    resetStarRating("rating-value", "rating-input");
});

// Quick Add
quickAddBtn.addEventListener("click", () => {
    const isbn = document.getElementById("quick-isbn-input").value.trim();
    const rating = parseInt(document.getElementById("rating-value-ISBN").value, 10);

    if (!isbn) {
        alert("Please enter an ISBN.");
        return;
    }

    if (rating === 0) {
        alert("Please select a star rating.");
        return;
    }

    // Placeholder quick-add behavior since no API/book lookup logic exists yet
    createBookCard({
        title: "Quick Added Book",
        author: "Unknown Author",
        isbn,
        genre: "Unknown Genre",
        description: "Added using Quick Add. Replace this with real ISBN lookup logic if needed.",
        rating
    });

    document.getElementById("quick-isbn-input").value = "";
    resetStarRating("rating-value-ISBN", "rating-input-ISBN");
});

// Star rating click logic
document.querySelectorAll(".star-rating").forEach((ratingContainer) => {
    const stars = ratingContainer.querySelectorAll(".star");
    const hiddenInput = ratingContainer.nextElementSibling;

    stars.forEach((star) => {
        star.addEventListener("click", () => {
            const value = Number(star.dataset.value);

            stars.forEach((s) => {
                const sValue = Number(s.dataset.value);
                s.classList.toggle("active", sValue <= value);
            });

            if (hiddenInput) {
                hiddenInput.value = value;
            }
        });
    });
});

// Initialize count on page load
updateBookCount();