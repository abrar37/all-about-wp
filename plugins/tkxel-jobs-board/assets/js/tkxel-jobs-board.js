document.addEventListener("DOMContentLoaded", function () {

	if (document.querySelector('.job-pagination')) {

		const itemsPerPage = 9;
		let currentPage = 1;

		const gridItems = document.querySelectorAll('.job-card');
		const prevBtn = document.getElementById('prevBtn');
		const nextBtn = document.getElementById('nextBtn');
		const pageNumbersContainer = document.querySelector('.page-numbers');

		function displayItems(page) {
			const startIndex = (page - 1) * itemsPerPage;
			const endIndex = startIndex + itemsPerPage;

			gridItems.forEach((item, index) => {
				if (index >= startIndex && index < endIndex) {
					item.style.display = 'block'; // Show item
				} else {
					item.style.display = 'none'; // Hide item
				}
			});

			updatePaginationButtons();
		};

		function updatePaginationButtons() {
			prevBtn.disabled = currentPage === 1;
			nextBtn.disabled = currentPage === Math.ceil(gridItems.length / itemsPerPage);

			// Generate page numbers
			const totalPages = Math.ceil(gridItems.length / itemsPerPage);
			pageNumbersContainer.innerHTML = '';

			for (let i = 1; i <= totalPages; i++) {
				const pageBtn = document.createElement('span');
				pageBtn.textContent = i;
				pageBtn.classList.add('page-number');
				if (i === currentPage) {
					pageBtn.classList.add('active');
				}

				pageBtn.addEventListener('click', () => {
					currentPage = i;
					displayItems(currentPage);
				});

				pageNumbersContainer.appendChild(pageBtn);
			}

			// prevBtn.addEventListener('click', () => {
			// 	if (currentPage > 1) {
			// 		currentPage--;
			// 		displayItems(currentPage);
			// 	}
			// });

			// nextBtn.addEventListener('click', () => {
			// 	if (currentPage < Math.ceil(gridItems.length / itemsPerPage)) {
			// 		currentPage++;
			// 		displayItems(currentPage);
			// 	}
			// });


        };
        
        // Initial display
        displayItems(currentPage);


		nextBtn.addEventListener('click', function() {
			let active_page = document.querySelector('.page-number.active');
			if (active_page.nextElementSibling) {
				active_page.nextElementSibling.click();
			}
		});

		prevBtn.addEventListener('click', function() {
			let active_page = document.querySelector('.page-number.active');
			if (active_page.previousElementSibling) {
				active_page.previousElementSibling.click();
			}
		});

	}



});
