<?php
include 'connect.php'

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css">



<div class="container mt-5">
    <h2>Manage Slider Links</h2>

    <!-- Add Link Form -->
    <form id="add-link-form" class="mb-4" method="POST">
        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <button type="submit" class="btn btn-primary" name="add_link">Add Link</button>
    </form>

    <!-- PHP Code: Add a Link -->
    <?php
    if (isset($_POST['add_link'])) {
        $image = $conn->real_escape_string($_POST['image']);
        $title = $conn->real_escape_string($_POST['title']);

        $sql = "INSERT INTO slider_links (image, title) VALUES ('$image', '$title')";
        if ($conn->query($sql)) {
            echo '<div class="alert alert-success">Link added successfully!</div>';
        } else {
            echo '<div class="alert alert-danger">Error adding link: ' . $conn->error . '</div>';
        }
    }
    ?>

    <!-- Links Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch links from the database
            // $result = $conn->query("SELECT * FROM slider_links");
            // while ($row = $result->fetch_assoc()) {
            //     echo "<tr>
            //             <td>{$row['id']}</td>
            //             <td><img src='{$row['image']}' alt='{$row['title']}' width='100'></td>
            //             <td>{$row['title']}</td>
            //             <td>
            //                 <form method='POST' style='display:inline-block;'>
            //                     <input type='hidden' name='id' value='{$row['id']}'>
            //                     <button type='submit' name='delete_link' class='btn btn-danger btn-sm'>Delete</button>
            //                 </form>
            //                 <form method='POST' style='display:inline-block;'>
            //                     <input type='hidden' name='id' value='{$row['id']}'>
            //                     <button type='button' class='btn btn-warning btn-sm' onclick='editLink({$row['id']}, \"{$row['image']}\", \"{$row['title']}\")'>Edit</button>
            //                 </form>
            //             </td>
            //         </tr>";
            // }
            ?>
        </tbody>
    </table>

    <!-- PHP Code: Delete a Link -->
    <?php
    if (isset($_POST['delete_link'])) {
        $id = $conn->real_escape_string($_POST['id']);

        $sql = "DELETE FROM slider_links WHERE id = $id";
        if ($conn->query($sql)) {
            echo '<div class="alert alert-success">Link deleted successfully!</div>';
            echo "<script>window.location.reload();</script>";
        } else {
            echo '<div class="alert alert-danger">Error deleting link: ' . $conn->error . '</div>';
        }
    }
    ?>

    <!-- PHP Code: Update a Link -->
    <?php
    if (isset($_POST['edit_link'])) {
        $id = $conn->real_escape_string($_POST['id']);
        $image = $conn->real_escape_string($_POST['image']);
        $title = $conn->real_escape_string($_POST['title']);

        $sql = "UPDATE slider_links SET image = '$image', title = '$title' WHERE id = $id";
        if ($conn->query($sql)) {
            echo '<div class="alert alert-success">Link updated successfully!</div>';
            echo "<script>window.location.reload();</script>";
        } else {
            echo '<div class="alert alert-danger">Error updating link: ' . $conn->error . '</div>';
        }
    }
    ?>
</div>

<!-- Slick Slider Section -->
<div class="container mt-5">
    <h2>Slider</h2>
    <section class="slider-section">
        <button class="prev-btn">Prev</button>
        <button class="next-btn">Next</button>
        <div class="slick-slider" id="dynamic-slider">
            <?php
            // Load slider links
            // $result = $conn->query("SELECT * FROM slider_links");
            // while ($row = $result->fetch_assoc()) {
            //     echo "<div><img src='{$row['image']}' alt='{$row['title']}'></div>";
            // }
            ?>
        </div>
    </section>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dynamic-slider').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false,
            dots: true,
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                },
            ],
        });

        $('.prev-btn').click(function() {
            $('#dynamic-slider').slick('slickPrev');
        });

        $('.next-btn').click(function() {
            $('#dynamic-slider').slick('slickNext');
        });
    });

    function editLink(id, image, title) {
        const form = `<form method="POST">
                <input type="hidden" name="id" value="${id}">
                <input type="text" name="image" value="${image}" required>
                <input type="text" name="title" value="${title}" required>
                <button type="submit" name="edit_link" class="btn btn-success">Update</button>
            </form>`;
        document.querySelector(`#link-${id}`).innerHTML = form;
    }
</script>






<!-- Slick Slider Section -->
<section class="slider-section">
    <!-- Custom Navigation Buttons -->
    <button class="prev-btn">Prev</button>
    <button class="next-btn">Next</button>

    <!-- Slick Slider -->
    <div class="slick-slider">
        <div><img src="image1.jpg" alt="Slide 1"></div>
        <div><img src="image2.jpg" alt="Slide 2"></div>
        <div><img src="image3.jpg" alt="Slide 3"></div>
        <div><img src="image4.jpg" alt="Slide 4"></div>
        <div><img src="image5.jpg" alt="Slide 5"></div>
        <div><img src="image6.jpg" alt="Slide 6"></div>
        <div><img src="image7.jpg" alt="Slide 7"></div>
    </div>
</section>

<style>
    .slider-section {
        position: relative;
        margin: 20px;
    }

    .slick-slider img {
        width: 100%;
        height: auto;
        display: block;
        border-radius: 5px;
    }

    button.prev-btn,
    button.next-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        z-index: 1000;
        border-radius: 5px;
    }

    button.prev-btn {
        left: 10px;
    }

    button.next-btn {
        right: 10px;
    }

    button.prev-btn:hover,
    button.next-btn:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>


<script>
    $(document).ready(function() {
        // Initialize Slick Slider
        $('.slick-slider').slick({
            slidesToShow: 5, // Number of slides on desktop
            slidesToScroll: 1, // Scroll one at a time
            autoplay: true,
            autoplaySpeed: 3000,
            arrows: false, // Turn off default arrows
            dots: true, // Show dots for pagination
            responsive: [{
                    breakpoint: 1200, // Smaller laptops
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 992, // Tablets
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 768, // Phones
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

        // Custom navigation button actions
        $('.prev-btn').click(function() {
            $('.slick-slider').slick('slickPrev');
        });

        $('.next-btn').click(function() {
            $('.slick-slider').slick('slickNext');
        });
    });
</script>