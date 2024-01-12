//All About See More/Less Content on button click

$(".ig-more-faq").hide();
$(".show-less-btn").hide();

$(".show-more-btn").click(function () {
  $(this).closest(".ig-faq-wrapper").find(".ig-more-faq").toggle(300);
  $(this).closest(".ig-faq-wrapper").find(".show-less-btn").toggle();
  $(this).closest(".ig-faq-wrapper").find(".show-more-btn").toggle();
});

$(".show-less-btn").click(function () {
  $(this).closest(".ig-faq-wrapper").find(".ig-more-faq").toggle(300);
  $(this).closest(".ig-faq-wrapper").find(".show-less-btn").toggle();
  $(this).closest(".ig-faq-wrapper").find(".show-more-btn").toggle();
});


// ==============================================


jQuery(".ig-more-faq").hide();
jQuery(".show-less-btn").hide();

jQuery(".show-more-btn").click(function () {
  jQuery(this).closest(".ig-content-wrapper").find(".ig-more-faq").toggle(300);
  jQuery(this).closest(".ig-content-wrapper").find(".show-less-btn").toggle();
  jQuery(this).closest(".ig-content-wrapper").find(".show-more-btn").toggle();
});

jQuery(".show-less-btn").click(function () {
  jQuery(this).closest(".ig-content-wrapper").find(".ig-more-faq").toggle(300);
  jQuery(this).closest(".ig-content-wrapper").find(".show-less-btn").toggle();
  jQuery(this).closest(".ig-content-wrapper").find(".show-more-btn").toggle();
});


// ==============================================


jQuery(document).ready(function ($) {
  jQuery(".elementor-icon-box-description").hide();
  jQuery(".show-less").hide();

  jQuery(".show-more").click(function () {
    jQuery(".elementor-icon-box-description").show();
    jQuery(".show-more").hide();
    jQuery(".show-less").toggle();
  });

  jQuery(".show-less").click(function () {
    jQuery(".elementor-icon-box-description").toggle(200);
    jQuery(".show-more").toggle();
    jQuery(".show-less").toggle();
  });
});


// ==============================================


const cardsWrapper = document.querySelector(".cards-wrapper");
cardsWrapper.addEventListener("click", (e) => {
  const showMore = e.target.closest(".show-more");
  const showLess = e.target.closest(".show-less");

  const cardText = e.target.closest(".e-con-inner");
  const description = cardText.querySelector(".elementor-icon-box-description");
  const showLessBtn = cardText.querySelector(".show-less");
  const showMoreBtn = cardText.querySelector(".show-more");

  if (showMore) {
    setTimeout(() => {
      description.style.display = "block";
      showLessBtn.style.display = "block";
      showMoreBtn.style.display = "none";
    }, 200);
  } else if (showLess) {
    description.style.display = "none";
    showLessBtn.style.display = "none";
    showMoreBtn.style.display = "block";
  }
});
