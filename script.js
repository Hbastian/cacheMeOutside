const addBtn = document.getElementById("add-btn");
const allBooks = document.getElementById("all-books");

addBtn.addEventListener("click", () => {
    const title = document.getElementById("title-input").value.trim();
    const author = document.getElementById("author-input").value.trim();
    const isbn = document.getElementById("isbn-input").value.trim();
    const genre = document.getElementById("genre-input").value.trim();
    const description = document.getElementById("description-area").value.trim();

    if (!title || !author || !isbn || !genre || !description) {
        alert("Please fill in all fields.");
        return;
    }

    const bookCard = document.createElement("div");
    bookCard.classList.add("book-card");

    bookCard.innerHTML = `
    <div class="book">
        <h3 class="book-title">${title}</h3>
        <p class="book-author"><strong>Author:</strong> ${author}</p>
        <p class="book-isbn"><strong>ISBN:</strong> ${isbn}</p>
        <p class="book-genre"><strong>Genre:</strong> ${genre}</p>
        <p class="book-description"><strong>Description:</strong> ${description}</p>
    </div>
`;

    allBooks.appendChild(bookCard);

    document.getElementById("title-input").value = "";
    document.getElementById("author-input").value = "";
    document.getElementById("isbn-input").value = "";
    document.getElementById("genre-input").value = "";
    document.getElementById("description-area").value = "";
});