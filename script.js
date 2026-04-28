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
    rating = Number(rating);

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

function loadBooksFromDatabase() {
    fetch("getBooks.php")
        .then((res) => res.json())
        .then((books) => {
            allBooks.innerHTML = "";

            books.forEach((book) => {
                createBookCard(book);
            });

            updateBookCount();
        })
        .catch((err) => console.log(err));
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

    fetch("addBook.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            title,
            author,
            isbn,
            genre,
            description,
            rating
        })
    })
        .then((res) => res.json())
        .then((data) => {
            if (data.success) {
                document.getElementById("title-input").value = "";
                document.getElementById("author-input").value = "";
                document.getElementById("manual-isbn-input").value = "";
                document.getElementById("genre-input").value = "";
                document.getElementById("description-area").value = "";

                resetStarRating("rating-value", "rating-input");

                loadBooksFromDatabase();
            } else {
                alert(data.message);
            }
        })
        .catch((err) => console.log(err));
});

// Quick Add placeholder
quickAddBtn.addEventListener("click", () => {
    alert("Quick Add with ISBN lookup is not connected yet. Use manual add for now.");
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

loadBooksFromDatabase();