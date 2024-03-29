<!DOCTYPE html>
<html>

<head>
    <title>Leave a Review</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="review.html">Write a review</a></li>
                <li><a href="vreviews.html">Write a review</a></li>
                <li><a href="login.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Leave a Review</h1>
        <form>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="rating">Rating</label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5" required>
                <label for="star5">☠️☠️☠️☠️☠️</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4">☠️☠️☠️☠️</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3">☠️☠️☠️</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2">☠️☠️</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1">☠️</label>
            </div>
            <label for="review">Review</label>
            <textarea id="review" name="review" rows="5" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>