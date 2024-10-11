
class TipCalculator {
	constructor() {
		// Create elements for the calculator
		this.button = document.querySelector(".calculateBtn");
		this.totalElement = document.querySelector(".total");
		this.peopleElement = document.querySelector(".people");
		this.percentageElements = document.querySelectorAll(".percentage");
		this.resultElement = document.querySelector(".result");

		// Attach the event listener in the constructor
		this.button.addEventListener("click", () => {
			this.calculateTip();
		});
	}

	calculateTip() {
		// Get the values from the inputs, format as needed
		const total = parseFloat(this.totalElement.value);
		const people = parseInt(this.peopleElement.value);
		let percentage = 0;

		// Use a variable to track validation errors
		let invalid = 0;

		// Remove 'is-invalid' class before revalidation
		this.totalElement.classList.remove("is-invalid");
		this.peopleElement.classList.remove("is-invalid");

		// Validate total and people inputs
		if (isNaN(total) || total <= 0) {
			this.totalElement.classList.add("is-invalid");
			invalid++;
		}

		if (isNaN(people) || people <= 0) {
			this.peopleElement.classList.add("is-invalid");
			invalid++;
		}

		if (invalid > 0) {
			return;
		}

		// Find the checked percentage
		this.percentageElements.forEach((element) => {
			if (element.checked) {
				percentage = parseInt(element.value);
			}
		});

		// Calculate tip and total per person
		const tipAmount = (total * (percentage / 100)) / people;
		const totalPerPerson = total / people + tipAmount;

		// Update the result element
		this.resultElement.querySelector(
			".tipamount"
		).textContent = `$${tipAmount.toFixed(2)}`;
		this.resultElement.querySelector(
			".perperson"
		).textContent = `$${totalPerPerson.toFixed(2)}`;
	}
}

// Create an instance of the TipCalculator
const calculator = new TipCalculator();


