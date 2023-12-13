document.addEventListener('DOMContentLoaded', function () {
  const categories = ["Skateboards", "Accessories", "Clothing"];

  categories.forEach(function (category) {
    const categoryElement = document.querySelector(`.category[data-category="${category}"]`);

    if (categoryElement) {
      categoryElement.addEventListener("click", function () {
        // Remove the "active" class from all categories
        categories.forEach(function (cat) {
          const catElement = document.querySelector(`.category[data-category="${cat}"]`);
          if (catElement) {
            catElement.classList.remove("active");
          }
        });

        // Add the "active" class to the clicked category
        categoryElement.classList.add("active");

        // Hide all product containers
        const productContainers = document.querySelectorAll(".list-produk");
        productContainers.forEach(function (container) {
          container.classList.remove("show");
        });

        // Show products of the selected category with animation
        const selectedCategoryProducts = document.querySelectorAll(`.list-produk[data-category="${category}"]`);
        selectedCategoryProducts.forEach(function (container, index) {
          setTimeout(() => {
            container.classList.add("show");
          }, index * 100); // Delay the animation for each product
        });
      });
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const detailButtons = document.querySelectorAll(".detail-btn");

  detailButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const detailInfo = this.previousElementSibling;
      detailInfo.style.display =
        detailInfo.style.display === "block" ? "none" : "block";
    });
  });
});

window.onscroll = function() {
  const navbar = document.querySelector('nav');
  if (window.pageYOffset > 50) {
    navbar.classList.add('sticky');
  } else {
    navbar.classList.remove('sticky');
  }
};
