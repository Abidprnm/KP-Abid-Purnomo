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
          container.style.display = "none";
        });

        // Show products of the selected category in a row
        const selectedCategoryProducts = document.querySelectorAll(`.list-produk[data-category="${category}"]`);
        selectedCategoryProducts.forEach(function (container) {
          container.style.display = "flex";
        });
      });
    }
  });
});
